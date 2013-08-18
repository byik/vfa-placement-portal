public function run()
    {
        Eloquent::unguard();
        $this->call('UserTableSeeder');
    }