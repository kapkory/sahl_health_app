<?php

namespace App\Models\Core;

use Illuminate\Database\Eloquent\Model;

class ContactMessage extends Model
{

	protected $fillable = ["contact_id","message_id","institution_id","status"];


}
