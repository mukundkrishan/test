<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Crud extends Model
{
    use HasFactory;
    
    protected $table = 'cruds';

    protected $fillable = [
        'name',
        'description',
        'image',
        'is_deleted',
    ];

    public function insertRecord($data)
    {   
        // dd($data);
        // if ($request->hasFile('file')) {
        //     $imagePath = $request->file('file')->store('images', 'public');
        //     $request['image'] = $imagePath;
        // }
        $crud = Crud::create([
            'name' => $data['name'],
            'description' => $data['desc'],
            'image' => $data['imagepath'] ?? null,
            'is_deleted' => 0,
        ]);
    }

    public function showList(){
        $crud = $this->table;
        $query = DB::table($crud)->select('id','name','description','image')->where('is_deleted','0')->get();
        return $query;
    }

    public function show($id){
        $crud = $this->table;
        $query = DB::table($crud)->select('id','name','description','image')->where('id',$id)->where('is_deleted','0')->get();
        return $query;
    }

    public function remove($id){
        $crud = $this->table;
        $item_id = DB::table($crud)->where('id',$id)
        ->update([
            'is_deleted'=> '1',
        ]);
        return $item_id;
    }
}
