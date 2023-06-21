use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
namespace Database\Seeders;


class UsersTableSeeder extends Seeder
{
    public function run()
    {
        $users = [
            [
                'name' => 'John Doe',
                'email' => 'johndoe@example.com',
                'email_verified_at' => now(),
                'admin' => true,
                'last_login' => now(),
                'password' => Hash::make('password123'),
                'remember_token' => str_random(10),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Jane Smith',
                'email' => 'janesmith@example.com',
                'email_verified_at' => now(),
                'admin' => false,
                'last_login' => now(),
                'password' => Hash::make('secret123'),
                'remember_token' => str_random(10),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            // Add more users as needed
        ];

        foreach ($users as $user) {
            DB::table('users')->insert($user);
        }
    }
}
