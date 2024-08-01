<?php

namespace App\Http\Controllers\API;

use App\ContactGroup;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ContactGroupController extends Controller
{
    /**
     * success response method.
     *
     * @return \Illuminate\Http\Response
     */
    public function getContact($id)
    {
    	$contact = ContactGroup::where('id', $id)->first();

        return response()->json($contact, 200);
    }

}
