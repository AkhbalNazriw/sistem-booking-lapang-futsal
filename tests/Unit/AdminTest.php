<?php

use App\Models\Admin;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class AdminTest extends TestCase
{
    use RefreshDatabase;

    public function testDeleteAdmin()
    {
        // Membuat data admin
        $admin = Admin::factory()->create();

        // Menghapus data admin
        $response = $this->delete("/admin/delete/{$admin->id}");

        // Memastikan data admin telah dihapus
        $this->assertDeleted($admin);

        // Memastikan pengalihan (redirect) ke halaman yang tepat
        $response->assertRedirect('/admin');

        // Memastikan pesan sukses ditampilkan
        $response->assertSessionHas('success', 'Data admin berhasil dihapus.');

        // Memastikan data admin tidak dapat ditemukan lagi
        $this->assertDatabaseMissing('admin', [
            'id' => $admin->id,
        ]);
    }
}
