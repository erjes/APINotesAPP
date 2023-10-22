<?php

namespace App\Http\Controllers;

use App\Models\Notes;
use Illuminate\Http\Request;


class NotesController extends Controller
{
    public function showdata(Request $request)
    {
        $Notes = Notes::where('UserID', $request->UserID)->get();
        $jsonNotes = json_encode($Notes);

        return response()->json($jsonNotes);
    }

    public function showimage(Request $request)
    {
        $imagename = $request->input('imagename');

        $path = public_path('image/' . $imagename);

        if (file_exists($path)) {
            return response()->file($path);
        }

        return response()->json(['error' => 'Gambar tidak tersedia'], 404);
    }

    public function create(Request $request)
    {
        $request->validate([
            'UserID' => 'required',
            'notes' => 'required',
        ]);

        $image = $request->file('image');
        // $video = $request->file('videoname');
        // $file = $request->file('filename');

        $imagename = $request->UserID . '.' . $image->getClientOriginalExtension();
        // $videoname = $request->imagename . '.' . $video->getClientOriginalExtension();
        // $filename = $request->imagename . '.' . $file->getClientOriginalExtension();

        $notes = [
            'notes' => $request->notes,
            'imagename' => $imagename,
        ];

        Notes::create($notes);

        $image->move(public_path('image'), $imagename);
        // $video->move(public_path('video'), $videoname);
        // $file->move(public_path('file'), $filename);

        return response()->json(['message' => 'Data dan Gambar berhasil diinput'], 201);
    }

    public function update(Request $request)
    {
        $request->validate([
            'UserID'  => 'required',
            'notes' => 'required',
        ]);
        $UserID = $request->UserID;
        $notes = [
            'notes' => $request->notes,
        ];
        Notes::where('UserID', $UserID)->update($notes);

        return response()->json(['message' => 'Data berhasil diperbarui'], 201);

    }

    public function destroy(Request $request)
    {
        $UserID = $request->UserID;
        Notes::where('UserID', $UserID)->delete();
        return response()->json(['message' => 'Data berhasil dihapus'], 201);
    }
}
