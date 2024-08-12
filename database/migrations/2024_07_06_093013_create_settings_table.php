<?php

use App\Models\setting;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('settings', function (Blueprint $table) {
            $table->id();
            $table->string('key');
            $table->string('label');
            $table->string('value')->nullable();
            $table->string('type');
            $table->timestamps();
        });

        setting::create([
            'key'=>'_site_name',
            'label'=>'Judul Situs',
            'value'=>'Website Nominatif',
            'type'=>'text',
        ]);
        setting::create([
            'key'=>'_location',
            'label'=>'Alamat',
            'value'=>'Kota Cimahi, Jawa Barat, Indonesia',
            'type'=>'text',

        ]);
        setting::create([
            'key'=>'_youtube',
            'label'=>'YouTube',
            'value'=>'https://www.youtube.com/@pusdikhubofficial8160',
            'type'=>'text',
        ]); 
        setting::create([
            'key'=>'_instagram',
            'label'=>'Instagram',
            'value'=>'https://www.instagram.com/pusdikhub_official/',
            'type'=>'text',
        ]);
        setting::create([
            'key'=>'_facebook',
            'label'=>'Facebook',
            'value'=>'https://www.facebook.com/pusdikhub.pushubad/',
            'type'=>'text',
        ]);
        setting::create([
            'key'=>'_twitter',
            'label'=>'Twitter',
            'value'=>'https://x.com/Pusdikhub_4204/',
            'type'=>'text',
        ]);
        setting::create([
            'key'=>'_site_description',
            'label'=>'Site Description',
            'value'=>'Website Nominatif, dengan admin filament, untuk hidup sederhana',
            'type'=>'text',
        ]);
        setting::create([
            'key' => '_phone',
            'label' => 'Phone',
            'value' => '(+6222) 6630327',
            'type'  => 'text',
        ]);
        setting::create([
            'key' => '_email',
            'label' => 'Email',
            'value' => 'pusdikhub.pushubad.tniad@gmail.com',
            'type'  => 'text',
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('settings');
    }
};
