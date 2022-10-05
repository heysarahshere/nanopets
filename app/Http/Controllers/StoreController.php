<?php

namespace App\Http\Controllers;

use App\Models\Creature;
use App\Models\Food;
use App\Models\Egg;
use App\Models\HousingItem;
use App\Models\Purchase;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Contracts\Session\Session;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Contracts\Filesystem\Filesystem;
use Illuminate\Support\Facades\File;
use Illuminate\Database\Eloquent;
use Illuminate\Support\Str;

class StoreController extends Controller
{
    public function getStoreFeatured()
    {
        $foods = Food::where('type', 'food')->orderBy('updated_at', 'desc')->paginate(8);
        $potions = Food::where('type', 'potion')->orderBy('updated_at', 'desc')->paginate(8);
        $eggs = Creature::where('dev_stage', 1)->orderBy('updated_at', 'desc')->paginate(8);
        return view('store/featured', [
            'foods' => $foods,
            'potions' => $potions,
            'eggs' => $eggs,
            'category' => "FEATURED",
            'current' => 'featured'
        ]);
    }


// --------------------------------------------------------------------------------------------- food
    public function getStoreFoods()
    {
        $foods = Food::where('type', 'food')->orderBy('updated_at', 'desc')->paginate(8);
        return view('store/food/all', ['foods' => $foods, 'category' => "FOODSTUFFS", 'current' => 'foods']);
    }

    public function getAddFood()
    {
        return view('store/food/add-food');
    }

    public function postAddFood(Request $request)
    {
        $request->validate([
            'name' => 'required|min:3',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'type' => 'required',
            'description' => 'required',
            'mainStat' => 'required',
            'cost' => 'required',
        ]);

        $food = new Food([
            'name' => $request->input('name'),
            'type' => $request->input('type'),
            'description' => $request->input('description'),
            'mainStat' => $request->input('mainStat'),
            'hunger' => $request->has('hungerInput'),
            'magic' => $request->has('magicInput') ? $request->input('magicInput') : 0,
            'stamina' => $request->has('staminaInput') ? $request->input('staminaInput') : 0,
            'strength' => $request->has('strengthInput') ? $request->input('strengthInput') : 0,
            'defense' => $request->has('defenseInput') ? $request->input('defenseInput') : 0,
            'health' => $request->has('healthInput') ? $request->input('healthInput') : 0,
            'mojo' => $request->has('mojoInput') ? $request->input('mojoInput') : 0,
            'breedableStat' => $request->input('mainStat'),
            'breedableStatChance' => $request->has('statChanceInput') ? $request->input('statChanceInput') : 0,
            'cost' => $request->input('cost')
        ]);

        $file = $request->file('image');
        $filename = trim("/images/foods/" . $request->input('name') . time()) . "." . $file->getClientOriginalExtension();  // multiple extension types
        if ($request->hasFile('image')) {

            Storage::disk('public')->put($filename, File::get($file));
            $food->image = $filename;
        }

        $food->save();
        return redirect()->route('foods');
    }

    public function postDeleteFood($id)
    {
        $food = Food::find($id);
        $food->delete();
        return redirect('store/food/all');
    }

    public function postUpdateFood(Request $request, $id)
    {

        $request->validate([
            'name' => 'required|min:3',
            'type' => 'required',
            'description' => 'required',
            'mainStat' => 'required',
            'cost' => 'required',
        ]);

        // find and update old instead
        $food = Food::find($id);
        $food->update([
            'name' => $request->input('name'),
            'type' => $request->input('type'),
            'description' => $request->input('description'),
            'mainStat' => $request->input('mainStat'),
            'hunger' => $request->has('hungerInput'),
            'magic' => $request->has('magicInput') ? $request->input('magicInput') : 0,
            'stamina' => $request->has('staminaInput') ? $request->input('staminaInput') : 0,
            'strength' => $request->has('strengthInput') ? $request->input('strengthInput') : 0,
            'defense' => $request->has('defenseInput') ? $request->input('defenseInput') : 0,
            'health' => $request->has('healthInput') ? $request->input('healthInput') : 0,
            'mojo' => $request->has('mojoInput') ? $request->input('mojoInput') : 0,
            'breedableStat' => $request->input('mainStat'),
            'breedableStatChance' => $request->has('statChanceInput') ? $request->input('statChanceInput') : 0,
            'cost' => $request->input('cost')
        ]);

        if ($request->has('image')) {
            $file = $request->file('image');
            $filename = trim("/images/foods/" . $request->input('name') . time()) . $file->getClientOriginalExtension();  // multiple extension types
            if ($request->hasFile('image')) {
                Storage::disk('public')->put($filename, File::get($file));
                $food->image = $filename;
            }
        }

        $food->save();

        return redirect('store/food/all');
    }

    public function getUpdateFood($id)
    {
        $food = Food::find($id);
        return view('store/food/edit-food', ['food' => $food]);
    }


    public function postPurchaseFood(Request $request)
    {
        $request->validate([
            'food_id' => 'required',
            'qty' => 'required|numeric|min:1'
        ]);

        if (Auth::check()) {

            // get user
            $user = Auth::user();
            $user_id = $user->id;

            // get the item & qty
            $food_id = $request->input('food_id');
            $qty = $request->input('qty');
            $food = Food::find($food_id);
            $cost = $food->cost * $qty;

            if ($user->balance >= $cost) {

                // create record of purchase
                if (Purchase::where('owner_id', $user_id)->where('item_id', $food_id)->exists()) {
                    $purchaseRecord = Purchase::where('owner_id', $user_id)->where('item_id', $food_id)->first();
                    $purchaseRecord->qty += $qty;
                } else {
                    $purchaseRecord = new Purchase([
                        'owner_id' =>  $user_id,
                        'item_id' =>  $food_id,
                        'qty' =>  $request->input('qty'),
                        'item_type' =>  'food',
                    ]);
                }

                $purchaseRecord->save();

                //charge user
                $user->balance -= $cost;
                $user->save();

                // redirect back to store
                $foods = Food::where('type', 'food')->orderBy('updated_at', 'desc')->paginate(8);
                return redirect()->route('foods', ['foods' => $foods, 'category' => "FOODSTUFFS", 'current' => 'foods'])
                    ->with('banner-message', 'Your purchase was successful.');
            } else  {

                return redirect()->back()->with('error', 'Oops, you do not have enough funds to buy that.');
            }

        } else {
            return redirect()->back()->with('error', 'You must be signed in to do that');
        }

    }

// --------------------------------------------------------------------------------------------- end food

    public function getStorePotions()
    {
        $foods = Food::where('type', 'potion')->orderBy('updated_at', 'desc')->paginate(8);
        return view('store/food/all', ['foods' => $foods, 'category' => "POTIONS", 'current' => 'potions']);
    }

    public function getStoreEggs()
    {
        $eggs = Egg::orderBy('updated_at', 'desc')->paginate(8);
        return view('store/eggs/all', ['eggs' => $eggs, 'category' => "CREATURE EGGS", 'current' => 'eggs']);
    }

    public function getHousingItems()
    {
        $items = HousingItem::orderBy('updated_at', 'desc')->paginate(8);
        return view('store/housing/all', ['items' => $items, 'category' => "HOUSING ITEMS", 'current' => 'housing']);
    }
}
