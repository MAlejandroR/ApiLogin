<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class StudentResource extends JsonResource
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
            "type" => "Students",
            "attributes" => [
                "id" => $this->id,
                "nombre" => $this->name,
                "email" => $this->email,
            ],
            "relationships" => [
                "teacher" => [
                    "data" => [
                        "type" => "teachers",  // Asegúrate de que el tipo es consistente y pluralizado si corresponde.
                        "id" => (string)$this->teacher->id  // Asegúrate de que el ID es una cadena
                    ],
                    "links" => [
                        "self" => url("api/alumnos/{$this->id}/relationships/teacher"),
                        "related" => url("api/alumnos/{$this->id}/teacher")
                    ]
                ]
            ],
            "links" => [
                'self' => url("api/alumnos/{$this->id}")
            ]
        ];
    }
}
