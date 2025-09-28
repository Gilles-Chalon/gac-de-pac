<?php

namespace App\Modules\Customer\Entities;

use CodeIgniter\Entity\Entity;

class CustomerProfile extends Entity
{
    protected $datamap = [];
    protected $dates   = ['created_at', 'updated_at', 'deleted_at'];
    protected $casts   = [
        'id'          => 'integer',
        'user_id'     => 'integer',
        'is_complete' => 'boolean',
        'preferences' => 'json', // Auto-cast JSON en array
    ];

    public function getFullName(): string
    {
        return trim("{$this->first_name} {$this->last_name}");
    }

    public function hasPreference(string $key): bool
    {
        return isset($this->preferences[$key]);
    }

    public function getPreference(string $key, $default = null)
    {
        return $this->preferences[$key] ?? $default;
    }

    public function setPreference(string $key, $value): self
    {
        $prefs = $this->preferences ?? [];
        $prefs[$key] = $value;
        $this->preferences = $prefs;
        return $this;
    }
}
