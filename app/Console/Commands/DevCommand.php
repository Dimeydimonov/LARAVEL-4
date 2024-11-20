<?php

    namespace App\Console\Commands;

    use App\Models\Avatar;
    use App\Models\Client;
    use App\Models\Position;
    use App\Models\Project;
    use App\Models\Reviem;
    use App\Models\Worker;
    use Illuminate\Console\Command;

    class DevCommand extends Command
    {
        protected $signature = 'develop';
        protected $description = 'Some develops';
        public function handle(): int
        {
        $this->prepareData();
        $this->prepareManyToMany();

//        $worker= Worker::find(5);
//        $client = Client::find(2);
//
//        $worker->reviems()->create([
//            'body' => 'body 1'
//        ]);
//
//            $worker->reviems()->create([
//                'body' => 'body 2'
//            ]);
//
//            $worker->reviems()->create([
//                'body' => 'body 3'
//            ]);
//
//            $client->reviems()->create([
//                'body' => 'body 1'
//            ]);
//
//            $client->reviems()->create([
//                'body' => 'body 2'
//            ]);
//
//            $client->reviems()->create([
//                'body' => 'body 3'
//            ]);
//        $reviem = Reviem::find(1);
//dd ($reviem->reviemable->toArray());
//        $avatar = Avatar:: find(3);
//        dd($avatar->avatarable->toArray());

//        $worker->avatar()->create([
//        'path' =>'some path'
//        ]);
//
//        $client->avatar()->create([
//            'path' =>'client path'
//        ]);
//
          return 0;
    }




        private function prepareData(): void
        {

            Client::create([
                'name' => 'Bob'
            ]);

            Client::create([
                'name' => 'John'
            ]);

            Client::create([
                'name' => 'Elena'
            ]);


            // Create positions
            $position1 = Position::create(['title' => 'Developer']);
            $position2 = Position::create(['title' => 'Manager']);
            $position3 = Position::create(['title' => 'AI']);

            // Worker data with all required fields
            $workerData1 = [
                'name' => 'Miti',
                'surname' => 'Mitin',
                'email' => 'mitin@gmail.com',
                'position_id' => $position1->id, // position_id should be passed
                'age' => 22,
                'description' => 'Some description',
                'is_married' => 1,
            ];
            $workerData2 = [
                'name' => 'Vancho',
                'surname' => 'Chovan',
                'email' => 'pesdyk@gmail.com',
                'position_id' => $position2->id,
                'age' => 25,
                'description' => 'Some description',
                'is_married' => 0,
            ];
            $workerData3 = [
                'name' => 'Kate',
                'surname' => 'GOOD',
                'email' => 'kayk@gmail.com',
                'position_id' => $position3->id,
                'age' => 30,
                'description' => 'Some description',
                'is_married' => 1,
            ];
            $workerData4 = [
                'name' => 'Alen',
                'surname' => 'find',
                'email' => 'alen@gmail.com',
                'position_id' => $position1->id,
                'age' => 44,
                'description' => 'Some description',
                'is_married' => 0,
            ];
            $workerData5 = [
                'name' => 'Sergo',
                'surname' => 'Aliphan',
                'email' => 'sergo@gmail.com',
                'position_id' => $position2->id,
                'age' => 54,
                'description' => 'Some description',
                'is_married' => 1,
            ];

            // Create workers
            $worker1 = Worker::create($workerData1);
            $worker2 = Worker::create($workerData2);
            $worker3 = Worker::create($workerData3);
            $worker4 = Worker::create($workerData4);
            $worker5 = Worker::create($workerData5);

            // Profile data with worker_id and required fields
            $profileData1 = [
                'city' => 'Tokio',
                'skill' => 'Coder',
                'experience' => 8,
                'finished_study_at' => '2020-06-14',
            ];
            $profileData2 = [
                'city' => 'ROME',
                'skill' => 'Boss',
                'experience' => 12,
                'finished_study_at' => '2017-06-14',
            ];
            $profileData3 = [
                'city' => 'Italy',
                'skill' => 'Frontend',
                'experience' => 4,
                'finished_study_at' => '2017-06-14',
            ];
            $profileData4 = [
                'city' => 'Mexica',
                'skill' => 'Backend',
                'experience' => 12,
                'finished_study_at' => '2004-06-14',
            ];
            $profileData5 = [
                'city' => 'France',
                'skill' => 'AI',
                'experience' => 9,
                'finished_study_at' => '2012-06-14',
            ];

            $worker1->profile()->create([$profileData1]);
            $worker2->profile()->create([$profileData2]);
            $worker3->profile()->create([$profileData3]);
            $worker4->profile()->create([$profileData4]);
            $worker5->profile()->create([$profileData5]);

        }

        private function prepareManyToMany()
        {
            // Retrieve workers by ID
            $workerBoss = Worker::find(2);
            $workerBackend = Worker::find(4);
            $workerFrontend = Worker::find(3);
            $workerAI = Worker::find(5);
            $workerCoder = Worker::find(1);

            // Create projects
            $project1 = Project::create(['title' => 'Shop']);
            $project2 = Project::create(['title' => 'Blog']);

          $project1->workers()->attach([

            $workerBoss->id,
            $workerBackend->id,
            $workerFrontend->id,
            $workerAI->id,
            $workerCoder->id,

          ]);

          $project2->workers()->attach([

              $workerBoss->id,
              $workerBackend->id,
              $workerFrontend->id,
              $workerAI->id,
              $workerCoder->id,

          ]);
        }
    }
