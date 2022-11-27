<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Http\Controllers\Skeleton;

class CreateAuthor extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'create:author {first_name} {last_name} {birthday} {biography} {gender} {place_of_birth} {token}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create author command';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $data = [
            'first_name' => $this->argument('first_name'),
            'last_name' => $this->argument('last_name'),
            'birthday' => $this->argument('birthday'),
            'biography' => $this->argument('biography'),
            'gender' => $this->argument('gender'),
            'place_of_birth' => $this->argument('place_of_birth'),
        ];

  //      dd($data);
        $response = Skeleton::http('api/v2/authors', $data, 'post', $this->argument('token'));
        if(isset($response['message'])) {
            $message = $response['message'];
        } else {
            $message = "Author has been created success";
        }
        echo $message;
    }
}
