<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Test;

class TestController extends Controller
{
    public function send(Request $request)
    {
        $send = new Test();
        $name = $request->aSendText;
        $balance = $request->aBalance;

        $send->name = $name;
        $send->balance = $balance;
        $send->save();

        return response(true, 201);
    }

    public function update()
    {
        $text = Test::get();

        return response($text, 201);
    }

    public function delete(Request $request)
    {
        $catch = $request->aDeleteID;
        Test::where("id", $catch)->delete();

        return response(true, 202);
    }

    public function change(Request $request)
    {
        $id = $request->idText;
        $changeName = $request->changeText;
        $changeBalance = $request->changeBal;

        $newText = Test::find($id);

        if ($changeName) {
            $newText->name = $changeName;
        }

        if ($changeBalance) {
            $newText->balance = $changeBalance;
        }

        $newText->save();

        return response(true, 201);
    }

    public function text(Request $request)
    {
        $id = $request->idText;

        $name = Test::find($id)->name;
        $balance = Test::find($id)->balance;

        $data = ["name" => $name, "balance" => $balance];

        return response($data, 201);
    }
}
