<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class CadastroTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_cadastro()
    {
        $pdf = UploadedFile::fake()->create('document.pdf')->size(400);

        $response = $this->json('POST', '/api/cadastro', [
            "nome" => "Teste input",
            "email" => "teste@teste",
            "telefone" => "111111",
            "endereco" => "Rua Teste, 15",
            "curriculo" => $pdf,
            "IP" => "127.0.1"
        ]);

        $response->assertStatus(201)
            ->assertJson([
                'created' => true,
            ]);
    }
}
