<?php

namespace Database\Seeders;

use App\Models\Product;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        User::create([
            'name' => 'Bagas Dwi Sulistyo',
            'username' => 'bagas12dwi_',
            'email' => 'bag12dwi.s@gmail.com',
            'password' => bcrypt('12345678'),
            'level' => 'admin'
        ]);

        User::create([
            'name' => 'Amirul',
            'username' => 'AmirulGod',
            'email' => 'amirul@gmail.com',
            'password' => bcrypt('12345678'),
            'level' => 'user'
        ]);

        Product::create([
            'nama' => 'Robusta Wonosalam',
            'kategori' => 'Bubuk Kopi',
            'harga' => '20000',
            'penjelasan_singkat' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptates, blanditiis?',
            'deskripsi' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Eos repudiandae ullam veniam doloribus nostrum delectus, eius facilis eum reiciendis. Fugit, autem corrupti ab voluptatem nihil enim quod. Sapiente, dignissimos esse. Quia officiis quasi a architecto officia ab maiores beatae molestias eos optio, alias in nobis, tempore rem! Officiis expedita quis aperiam in quam voluptatem at ipsam, sit nam maiores amet illum sint vero modi esse totam voluptates dolorum, magni dolore corporis doloremque molestias nobis laborum? Reprehenderit iusto dignissimos distinctio ratione.',
            'gambar' => 'abc.jpeg'
        ]);
        Product::create([
            'nama' => 'Arabika Wonosalam',
            'kategori' => 'Bubuk Kopi',
            'harga' => '20000',
            'penjelasan_singkat' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptates, blanditiis?',
            'deskripsi' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Eos repudiandae ullam veniam doloribus nostrum delectus, eius facilis eum reiciendis. Fugit, autem corrupti ab voluptatem nihil enim quod. Sapiente, dignissimos esse. Quia officiis quasi a architecto officia ab maiores beatae molestias eos optio, alias in nobis, tempore rem! Officiis expedita quis aperiam in quam voluptatem at ipsam, sit nam maiores amet illum sint vero modi esse totam voluptates dolorum, magni dolore corporis doloremque molestias nobis laborum? Reprehenderit iusto dignissimos distinctio ratione.',
            'gambar' => 'abc.jpeg'
        ]);
        Product::create([
            'nama' => 'Jember',
            'kategori' => 'Bubuk Kopi',
            'harga' => '20000',
            'penjelasan_singkat' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptates, blanditiis?',
            'deskripsi' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Eos repudiandae ullam veniam doloribus nostrum delectus, eius facilis eum reiciendis. Fugit, autem corrupti ab voluptatem nihil enim quod. Sapiente, dignissimos esse. Quia officiis quasi a architecto officia ab maiores beatae molestias eos optio, alias in nobis, tempore rem! Officiis expedita quis aperiam in quam voluptatem at ipsam, sit nam maiores amet illum sint vero modi esse totam voluptates dolorum, magni dolore corporis doloremque molestias nobis laborum? Reprehenderit iusto dignissimos distinctio ratione.',
            'gambar' => 'abc.jpeg'
        ]);
        Product::create([
            'nama' => 'Arabika',
            'kategori' => 'Bubuk Kopi',
            'harga' => '20000',
            'penjelasan_singkat' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptates, blanditiis?',
            'deskripsi' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Eos repudiandae ullam veniam doloribus nostrum delectus, eius facilis eum reiciendis. Fugit, autem corrupti ab voluptatem nihil enim quod. Sapiente, dignissimos esse. Quia officiis quasi a architecto officia ab maiores beatae molestias eos optio, alias in nobis, tempore rem! Officiis expedita quis aperiam in quam voluptatem at ipsam, sit nam maiores amet illum sint vero modi esse totam voluptates dolorum, magni dolore corporis doloremque molestias nobis laborum? Reprehenderit iusto dignissimos distinctio ratione.',
            'gambar' => 'abc.jpeg'
        ]);
    }
}
