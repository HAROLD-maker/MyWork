<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Slider;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class SliderController extends Controller
{
    public function index()
    {
        $sliders = Slider::orderBy('order')->get();
        return JsonResource::collection($sliders);
    }

    public function show(Slider $slider)
    {
        return new JsonResource($slider);
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'title' => 'nullable|string|max:255',
            'image_path' => 'required|string|max:255',
            'order' => 'nullable|integer',
        ]);
        $slider = Slider::create($data);
        return new JsonResource($slider);
    }

    public function update(Request $request, Slider $slider)
    {
        $data = $request->validate([
            'title' => 'nullable|string|max:255',
            'image_path' => 'sometimes|string|max:255',
            'order' => 'nullable|integer',
        ]);
        $slider->update($data);
        return new JsonResource($slider);
    }

    public function destroy(Slider $slider)
    {
        $slider->delete();
        return response()->json(['message' => 'Slider eliminado']);
    }

    public function active()
    {
        $sliders = Slider::orderBy('order')->take(5)->get();
        return JsonResource::collection($sliders);
    }
} 