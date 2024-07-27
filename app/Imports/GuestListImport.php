<?php

namespace App\Imports;

use App\Helpers\LogActivity;
use App\Models\Event;
use App\Models\GuestList;
use App\Models\Invite;
use App\Models\Order;
use App\User;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithStartRow;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class GuestListImport implements ToCollection, WithStartRow
{
    /**
    * @param Collection $collection
    */

    protected $event_id;

    public function __construct($event_id)
    {
        $this->event_id = $event_id;
    }
        
    

    public function collection(Collection $collection)
    {
        DB::beginTransaction();

        $no_hp = 8100000011;

        foreach ($collection as $row) {
            if ($row[2] === null) {
                $row[2] = ++$no_hp;
            }
            if ($row[3] == null) {
                $row[3] = 'Sendiri';
            }
            if ($row[4] == null) {
                $row[4] = 'Standar';
            }
            $check_invite = Invite::where('event_id',$this->event_id)
                ->where('name', $row[0])
                ->where('no_hp', $row[2])
                ->get();

            if ($check_invite->count()==0){
                $new_invite = new Invite();
                $new_invite->event_id = $this->event_id;
                $new_invite->rand_code = Str::random(4);
                $new_invite->name = $row[0];
                $new_invite->address = $row[1];
                $new_invite->no_hp = "".$row[2];
                $new_invite->klasifikasi = $row[3];
                $new_invite->tipe = $row[4];
                $new_invite->kode_qr = "aD|". Str::random(15) ."|hOOfey|".$this->event_id;
                $new_invite->is_invited = 1;
                $new_invite->is_confirmed = 0;
                $new_invite->save();

            } else {
                    // if ($check_invites->no_hp != "".$row[2]) {
                    //     $new_invite = new Invite();
                    //     $new_invite->event_id = $this->event_id;
                    //     $new_invite->name = $row[0];
                    //     $new_invite->address = $row[1];
                    //     $new_invite->no_hp = "".$row[2];
                    //     $new_invite->klasifikasi = $row[3];
                    //     $new_invite->kode_qr = "ad| ". Str::random(10) ." |hoofey";
                    //     $new_invite->is_invited = 1;
                    //     $new_invite->is_confirmed = 0;
                    //     $new_invite->save();
    
                    // } else {
    
                        LogActivity::addToLog('Data '.$row[0].' sudah ada', 'Menambah akun dari halaman event');
    
                    // }
            }
                
        }

        DB::commit();
    }

    
    public function startRow(): int
    {
        return 2;
    }
}
