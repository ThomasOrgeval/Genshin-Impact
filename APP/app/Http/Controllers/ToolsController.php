<?php

namespace App\Http\Controllers;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ToolsController extends Controller
{
    function calculator()
    {
        $characters = DB::table('characters')->orderBy('label')->get();

        return view('tools.calculator', ['characters' => $characters]);
    }

    function ajaxCharacter(Request $request): JsonResponse
    {
        $ascensions = DB::table('ascensions')
            ->whereBetween('id', [$request->input('lvl_min'), $request->input('lvl_max')])->get();

        $stone1 = 0;
        $stone2 = 0;
        $stone3 = 0;
        $stone4 = 0;

        $core = 0;

        $flower = 0;

        $item1 = 0;
        $item2 = 0;
        $item3 = 0;

        $moras = 0;

        $xp1 = 0;
        $xp2 = 0;
        $xp3 = 0;

        foreach ($ascensions as $ascension) {
            switch ($ascension->rarity_stone) {
                case '2':
                    $stone1 += $ascension->stone;
                    break;
                case '3':
                    $stone2 += $ascension->stone;
                    break;
                case '4':
                    $stone3 += $ascension->stone;
                    break;
                case '5':
                    $stone4 += $ascension->stone;
                    break;
            }

            switch ($ascension->rarity_item) {
                case '1':
                    $item1 += $ascension->item;
                    break;
                case '2':
                    $item2 += $ascension->item;
                    break;
                case '3':
                    $item3 += $ascension->item;
                    break;
            }

            $core += $ascension->core;
            $flower += $ascension->flower;

            $moras += $ascension->moras;
            $xp1 += $ascension->xp1;
            $xp2 += $ascension->xp2;
            $xp3 += $ascension->xp3;
        }

        $moras += $xp1 * 200 + $xp2 * 1000 + $xp3 * 4000;

        $array = array('stone1' => $stone1, 'stone2' => $stone2, 'stone3' => $stone3, 'stone4' => $stone4,
            'lvl1' => $core, 'lvl2' => $flower, 'lvl3_1' => $item1, 'lvl3_2' => $item2, 'lvl3_3' => $item3,
            'moras1' => $moras, 'xp1' => $xp1, 'xp2' => $xp2, 'xp3' => $xp3);
        return response()->json($array);
    }

    function ajaxTalent(Request $request): JsonResponse
    {
        $val = array([$request->input('tal_min1'), $request->input('tal_max1')],
            [$request->input('tal_min2'), $request->input('tal_max2')],
            [$request->input('tal_min3'), $request->input('tal_max3')]);

        $book1 = 0;
        $book2 = 0;
        $book3 = 0;

        $core = 0;

        $item1 = 0;
        $item2 = 0;
        $item3 = 0;

        $moras = 0;

        $crown = 0;

        foreach ($val as $lim) {
            $tal = DB::table('talents')->whereBetween('id', [$lim[0], $lim[1]])->get();

            foreach ($tal as $talent) {
                switch ($talent->rarity_book) {
                    case '1':
                        $book1 += $talent->book;
                        break;
                    case '2':
                        $book2 += $talent->book;
                        break;
                    case '3':
                        $book3 += $talent->book;
                        break;
                }

                switch ($talent->rarity_item) {
                    case '1':
                        $item1 += $talent->item;
                        break;
                    case '2':
                        $item2 += $talent->item;
                        break;
                    case '3':
                        $item3 += $talent->item;
                        break;
                }

                $core += $talent->core;
                $moras += $talent->moras;
                $crown += $talent->crown;
            }
        }

        $array = array('tal1_1' => $book1, 'tal1_2' => $book2, 'tal1_3' => $book3, 'tal3' => $core,
            'crown' => $crown, 'tal2_1' => $item1, 'tal2_2' => $item2, 'tal2_3' => $item3, 'moras2' => $moras);
        return response()->json($array);
    }

    function ajaxSelect(Request $request): JsonResponse
    {
        $character = DB::table('characters')
            ->join('character_material as cm', 'cm.id', 'characters.id')
            ->join('items as lvl1', 'lvl1.id', 'cm.lvl_up1')
            ->join('items as lvl2', 'lvl2.id', 'cm.lvl_up2')
            ->join('items as lvl3_1', 'lvl3_1.id', 'cm.lvl_up3_1')
            ->join('items as lvl3_2', 'lvl3_2.id', 'cm.lvl_up3_2')
            ->join('items as lvl3_3', 'lvl3_3.id', 'cm.lvl_up3_3')
            ->join('items as tal1_1', 'tal1_1.id', 'cm.tal_up1_1')
            ->join('items as tal1_2', 'tal1_2.id', 'cm.tal_up1_2')
            ->join('items as tal1_3', 'tal1_3.id', 'cm.tal_up1_3')
            ->join('items as tal2_1', 'tal2_1.id', 'cm.tal_up2_1')
            ->join('items as tal2_2', 'tal2_2.id', 'cm.tal_up2_2')
            ->join('items as tal2_3', 'tal2_3.id', 'cm.tal_up2_3')
            ->join('items as tal3', 'tal3.id', 'cm.tal_up3')
            ->where('characters.label', 'like', $request->input('char'))
            ->select([
                'lvl1.label as lvl1',
                'lvl2.label as lvl2',
                'lvl3_1.label as lvl3_1',
                'lvl3_2.label as lvl3_2',
                'lvl3_3.label as lvl3_3',
                'tal1_1.label as tal1_1',
                'tal1_2.label as tal1_2',
                'tal1_3.label as tal1_3',
                'tal2_1.label as tal2_1',
                'tal2_2.label as tal2_2',
                'tal2_3.label as tal2_3',
                'tal3.label as tal3',
                'element as elem'
            ])->first();

        switch ($character->elem) {
            case 'Anemo':
                $character->stone1 = 'Vayuda Turquoise Sliver';
                $character->stone2 = 'Vayuda Turquoise Fragment';
                $character->stone3 = 'Vayuda Turquoise Chunk';
                $character->stone4 = 'Vayuda Turquoise Gemstone';
                break;
            case 'Geo':
                $character->stone1 = 'Prithiva Topaz Sliver';
                $character->stone2 = 'Prithiva Topaz Fragment';
                $character->stone3 = 'Prithiva Topaz Chunk';
                $character->stone4 = 'Prithiva Topaz Gemstone';
                break;
            case 'Pyro':
                $character->stone1 = 'Agnidus Agate Sliver';
                $character->stone2 = 'Agnidus Agate Fragment';
                $character->stone3 = 'Agnidus Agate Chunk';
                $character->stone4 = 'Agnidus Agate Gemstone';
                break;
            case 'Dendro':
                $character->stone1 = 'Nagadus Emerald Sliver';
                $character->stone2 = 'Nagadus Emerald Fragment';
                $character->stone3 = 'Nagadus Emerald Chunk';
                $character->stone4 = 'Nagadus Emerald Gemstone';
                break;
            case 'Electro':
                $character->stone1 = 'Vajrada Amethyst Sliver';
                $character->stone2 = 'Vajrada Amethyst Fragment';
                $character->stone3 = 'Vajrada Amethyst Chunk';
                $character->stone4 = 'Vajrada Amethyst Gemstone';
                break;
            case 'Cryo':
                $character->stone1 = 'Shivada Jade Sliver';
                $character->stone2 = 'Shivada Jade Fragment';
                $character->stone3 = 'Shivada Jade Chunk';
                $character->stone4 = 'Shivada Jade Gemstone';
                break;
            case 'Hydro':
                $character->stone1 = 'Varunada Lazurite Sliver';
                $character->stone2 = 'Varunada Lazurite Fragment';
                $character->stone3 = 'Varunada Lazurite Chunk';
                $character->stone4 = 'Varunada Lazurite Gemstone';
                break;
            case 'All': // Lumine and Aether
                $character->stone1 = 'Brilliant Diamond Sliver';
                $character->stone2 = 'Brilliant Diamond Fragment';
                $character->stone3 = 'Brilliant Diamond Chunk';
                $character->stone4 = 'Brilliant Diamond Gemstone';
                break;
        }

        unset($character->elem);

        return response()->json($character);
    }
}
