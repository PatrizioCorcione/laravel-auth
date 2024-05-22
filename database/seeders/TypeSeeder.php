<?php

namespace Database\Seeders;

use App\Models\types;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Functions\Helper;

class TypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $types = [
            'Front End',
            'Back End',
            'Full Stack',
        ];
        foreach ($types as $item) {
            $new_type = new types();
            $new_type->type = $item;
            $new_type->slug = helper::makeSlug($new_type->type, new types());
            $new_type->save();
        }
    }
}
