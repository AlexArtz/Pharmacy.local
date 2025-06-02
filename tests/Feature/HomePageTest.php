<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class HomePageTest extends TestCase
{
    public function test_home_page_loads_with_bootstrap_link()
    {
        // Выполняем GET-запрос к маршруту 'home'
        $response = $this->get(route('home'));

        // Проверяем, что статус ответа 200
        $response->assertStatus(200);

        // Проверяем, что страница содержит ссылку с классом 'link-primary'
        $response->assertSee('class="link-primary"', false);
    }
}
