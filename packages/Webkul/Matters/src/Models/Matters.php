<?php

namespace Webkul\Matters\Models;

use Illuminate\Database\Eloquent\Model;
use Webkul\Matters\Contracts\Matters as MattersContract;
use Webkul\Contact\Models\PersonProxy;
use Webkul\Organization\Models\OrganizationProxy;
use Webkul\User\Models\UserProxy;

class Matters extends Model implements MattersContract
{
    // Specify the database table
    protected $table = 'matters';

    // Define which attributes can be mass-assigned
    protected $fillable = [
        'number', 'title', 'description', 'status', 
        'person_id', 'organisation_id', 'assigned_to', 
        'start_date', 'close_date'
    ];

    // Attribute casting
    protected $casts = [
        'start_date' => 'date',
        'close_date' => 'date',
    ];

    /**
     * Define relationships
     */
    
    // Relationship to a Person model
    public function person()
    {
        return $this->belongsTo(PersonProxy::modelClass(), 'person_id');
    }

    // Relationship to an Organization model
    public function organisation()
    {
        return $this->belongsTo(OrganizationProxy::modelClass(), 'organisation_id');
    }

    // Relationship to a User model for the assigned user
    public function assignedUser()
    {
        return $this->belongsTo(UserProxy::modelClass(), 'assigned_to');
    }

    /**
     * Additional methods
     */

    // Scope for filtering matters by status
    public function scopeStatus($query, $status)
    {
        return $query->where('status', $status);
    }
}
