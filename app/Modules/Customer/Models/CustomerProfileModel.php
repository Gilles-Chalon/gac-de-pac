<?php

namespace App\Modules\Customer\Models;

use CodeIgniter\Model;
use App\Modules\Customer\Entities\CustomerProfile;

class CustomerProfileModel extends Model
{
    protected $table         = 'customer_profiles';
    protected $primaryKey    = 'id';
    protected $useAutoIncrement = true;

    protected $returnType    = CustomerProfile::class;
    protected $useSoftDeletes = true;

    protected $allowedFields = [
        'user_id',
        'first_name',
        'last_name',
        'phone',
        'address',
        'city',
        'postal_code',
        'country',
        'preferences',
        'is_complete',
    ];

    protected $useTimestamps = true;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    public function findByUserId(int $userId): ?CustomerProfile
    {
        return $this->where('user_id', $userId)->first();
    }

    public function markAsComplete(int $id): bool
    {
        return $this->update($id, ['is_complete' => true]);
    }
}
