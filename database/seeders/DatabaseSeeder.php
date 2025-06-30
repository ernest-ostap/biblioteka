<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Author;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);

        // Dodaj przykładowych autorów
        Author::create([
            'first_name' => 'Adam',
            'last_name' => 'Mickiewicz',
            'bio' => 'Polski poeta, dramatopisarz, publicysta, tłumacz, filozof, działacz polityczny, wolnomularz.'
        ]);

        Author::create([
            'first_name' => 'Juliusz',
            'last_name' => 'Słowacki',
            'bio' => 'Polski poeta, dramatopisarz i epistolograf. Jeden z najwybitniejszych twórców romantycznych.'
        ]);

        Author::create([
            'first_name' => 'Henryk',
            'last_name' => 'Sienkiewicz',
            'bio' => 'Polski nowelista, powieściopisarz i publicysta. Laureat Nagrody Nobla w dziedzinie literatury.'
        ]);

        Author::create([
            'first_name' => 'Bolesław',
            'last_name' => 'Prus',
            'bio' => 'Polski pisarz, prozaik, nowelista i publicysta okresu pozytywizmu.'
        ]);
    }
}
