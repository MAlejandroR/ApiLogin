<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class TeacherResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            "id" => (string)$this->id,
            "type" => "teachers",
            "attributes" => [
                "id" => $this->id,
                "nombre" => $this->name,
                "email" => $this->email,
                "departament" => $this->departament,
            ],
            "relationships" => [
                "students" => [
                    "data" =>  $this->students->map(function($student) {
                        return [
                            "type" => "students",
                            "id" => (string)$student->id
                        ];
                    })->all(),
                    "links" => $this->students? [
                        "self" => url("api/teachers/{$this->id}/relationships/students"),
                        "related" => url("api/teachers/{$this->id}/students")
                    ]:[]
                ]
            ],
            "links" => [
                'self' => url("api/teachers/{$this->id}")
            ]
        ];
    }
}
