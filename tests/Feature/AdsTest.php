<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class AdsTest extends TestCase
{
  use DatabaseMigrations;
    /**
     * A basic feature test example.
     *
     * @return void
     */
    /**
     * проверяем статус на запрос списка объявлений
     * @test
     */
    public function test_response_list_ads()
    {
      $response = $this->get('/list');

      $response->assertStatus(200);
    }
    /**
     * * проверяем структу возвращаемого списка
     * @test
     */
    public function test_json_list_ads()
    {
      $response = $this->get('/list');
      $response->assertJsonStructure([
        '*' => [
          'id',
          'created_at',
          'updated_at',
          'name',
          'description',
          'price',
          'photo',
        ]
      ]);
    }
    /**
     * проверка на добавление новой записи в БД с возвратом статуса
     * @test
     */
    public function test_create_new_records_with_headers()
    {

      $response = $this->withHeaders([
        'X-Header' => 'Value',
      ])->json('post', '/card/create', ['name' => 'Some', 'price' => 100, 'description' => 'Some desc']);

      $response->assertStatus(201);
    }

}
