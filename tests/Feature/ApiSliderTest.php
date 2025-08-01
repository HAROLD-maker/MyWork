<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Models\Slider;

class ApiSliderTest extends TestCase
{
    use RefreshDatabase;

    public function test_slider_index_returns_sliders()
    {
        Slider::factory()->count(3)->create();
        $response = $this->getJson('/api/sliders');
        $response->assertStatus(200)->assertJsonStructure(['data']);
    }

    public function test_slider_show_returns_slider()
    {
        $slider = Slider::factory()->create();
        $response = $this->getJson('/api/sliders/'.$slider->id);
        $response->assertStatus(200)->assertJson(['data' => ['id' => $slider->id]]);
    }

    public function test_slider_store_creates_slider()
    {
        $data = [
            'title' => 'Slider Test',
            'image_path' => 'images/slider1.png',
            'order' => 1,
        ];
        $response = $this->postJson('/api/sliders', $data);
        $response->assertStatus(200)->assertJson(['data' => ['title' => 'Slider Test']]);
        $this->assertDatabaseHas('sliders', ['title' => 'Slider Test']);
    }

    public function test_slider_update_modifies_slider()
    {
        $slider = Slider::factory()->create();
        $response = $this->putJson('/api/sliders/'.$slider->id, ['title' => 'Nuevo Slider']);
        $response->assertStatus(200)->assertJson(['data' => ['title' => 'Nuevo Slider']]);
        $this->assertDatabaseHas('sliders', ['id' => $slider->id, 'title' => 'Nuevo Slider']);
    }

    public function test_slider_destroy_deletes_slider()
    {
        $slider = Slider::factory()->create();
        $response = $this->deleteJson('/api/sliders/'.$slider->id);
        $response->assertStatus(200)->assertJson(['message' => 'Slider eliminado']);
        $this->assertDatabaseMissing('sliders', ['id' => $slider->id]);
    }
} 