<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Product;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // 1. Akun Admin (Zidan & RonaWear)
        User::create([
            'name' => 'Admin Zidan',
            'email' => 'zidan@ronawear.com',
            'password' => Hash::make('zidan123'),
        ]);

        User::create([
            'name' => 'Admin RonaWear',
            'email' => 'admin@ronawear.com',
            'password' => Hash::make('admin123'),
        ]);

        // 2. Data Kategori Pakaian Khas Lampung
        $kaos = Category::create([
            'name' => 'Kaos',
            'description' => 'Koleksi kaos harian & kaos polo khas Lampung berhiaskan sulam Tapis, mahkota Siger emas, dan aksara Lampung berbahan katun combed premium.',
        ]);

        $kemeja = Category::create([
            'name' => 'Kemeja',
            'description' => 'Kemeja polos, casual, dan formal dengan sulam Tapis Lampung asli serta motif batik Siger kebanggaan PT Zidan Pakaian Lampung.',
        ]);

        $hoodie = Category::create([
            'name' => 'Hoodie',
            'description' => 'Hoodie fleece premium dengan aksen motif Tapis dan Celugam khas Lampung Barat, hangat dan stylish untuk anak muda.',
        ]);

        $jaket = Category::create([
            'name' => 'Jaket',
            'description' => 'Outerwear, bomber, dan blazer kombinasi motif Tapis Lampung modern untuk tampil elegan dan berkelas.',
        ]);

        $celana = Category::create([
            'name' => 'Celana',
            'description' => 'Celana chino, jogger, dan bawahan kasual berkualitas dengan sentuhan etnik rapi dari PT Zidan Pakaian Lampung.',
        ]);

        // =============================================
        // 3. Produk Khas Lampung (4 per kategori = 20 produk)
        // =============================================

        // ---- KAOS KHAS LAMPUNG (4 produk) ----
        Product::create([
            'category_id' => $kaos->id,
            'name' => 'Kaos Polo Bordir Siger Emas',
            'description' => 'Kaos polo hitam elegan berhiaskan bordir mahkota Siger Lampung benang emas di dada serta kain tenun Tapis asli pada ujung lengan dan aksen saku bawah. Bahan lacoste pique CVC premium yang tebal, adem, dan sangat eksklusif.',
            'price' => 135000,
            'stock' => 45,
            'image' => 'images/products/kaos-polo-siger.jpg',
        ]);

        Product::create([
            'category_id' => $kaos->id,
            'name' => 'Kaos Tapis Siger Lampung',
            'description' => 'Kaos premium bernuansa budaya Lampung dengan sablon sulam emas motif Siger Lampung. Berbahan 100% Cotton Combed 30s reaktif yang super adem, menyerap keringat, dan tahan lama.',
            'price' => 85000,
            'stock' => 50,
            'image' => 'images/products/kaos-tapis-siger.jpg',
        ]);

        Product::create([
            'category_id' => $kaos->id,
            'name' => 'Kaos Etnik Aksara Lampung',
            'description' => 'Kaos kasual modern berhiaskan tipografi aksara Lampung (Had Lampung) dan motif ornamen tapis di bagian dada. Potongan regular fit nyaman untuk santai maupun jalan-jalan.',
            'price' => 79000,
            'stock' => 40,
            'image' => 'images/products/kaos-etnik-lampung.jpg',
        ]);

        Product::create([
            'category_id' => $kaos->id,
            'name' => 'Kaos Polo Tapis Series Navy',
            'description' => 'Kaos polo berkerah elegan dengan kombinasi lis motif Tapis Lampung di bagian kerah dan plaket kancing. Pilihan tepat untuk seragam dinas instansi, kantor, maupun acara semi-resmi di Lampung.',
            'price' => 125000,
            'stock' => 30,
            'image' => 'images/products/kaos-polo-tapis.jpg',
        ]);

        // ---- KEMEJA KHAS LAMPUNG (4 produk) ----
        Product::create([
            'category_id' => $kemeja->id,
            'name' => 'Kemeja Polos Lampung Bordir Tapis Siger',
            'description' => 'Kemeja putih eksklusif RonaWear Wear Your Style dengan aksen garis vertikal sulam tenun Tapis Lampung benang emas & hitam di dada, kerah kemeja, serta saku depan. Berbahan katun primisima premium yang adem, halus, dan sangat berkelas untuk acara formal maupun adat.',
            'price' => 189000,
            'stock' => 35,
            'image' => 'images/products/kemeja-tapis-putih.jpg',
        ]);

        Product::create([
            'category_id' => $kemeja->id,
            'name' => 'Kemeja Sulam Tapis Lampung Formal',
            'description' => 'Kemeja lengan panjang eksklusif dengan aksen sulam Tapis Lampung benang emas asli di bagian dada. Dibuat dari katun toyobo fodu import yang halus, jatuh, dan dingin.',
            'price' => 195000,
            'stock' => 25,
            'image' => 'images/products/kemeja-tapis-formal.jpg',
        ]);

        Product::create([
            'category_id' => $kemeja->id,
            'name' => 'Kemeja Batik Siger Modern Lampung',
            'description' => 'Kemeja batik katun primisima dengan motif batik tulis perpaduan mahkota Siger, motif kapal, dan ornamen tapis kontemporer khas Sang Bumi Ruwa Jurai.',
            'price' => 175000,
            'stock' => 30,
            'image' => 'images/products/kemeja-batik-siger.jpg',
        ]);

        Product::create([
            'category_id' => $kemeja->id,
            'name' => 'Kemeja Casual Etnik Lampung',
            'description' => 'Kemeja casual lengan pendek berbahan katun oxford adem dengan sentuhan print motif etnik Lampung di bagian bahu dan kerah. Pas untuk kuliah, nongkrong, atau kerja santai.',
            'price' => 145000,
            'stock' => 28,
            'image' => 'images/products/kemeja-casual-lampung.jpg',
        ]);

        // ---- HOODIE KHAS LAMPUNG (4 produk) ----
        Product::create([
            'category_id' => $hoodie->id,
            'name' => 'Hoodie Sulam Tapis Lampung',
            'description' => 'Hoodie fleece tebal 300 gsm berhiaskan bordir motif Tapis Lampung emas di bagian lengan dan punggung. Hangat, nyaman, dan membuat penampilan bergaya streetwear khas lokal.',
            'price' => 210000,
            'stock' => 20,
            'image' => 'images/products/hoodie-tapis-lampung.jpg',
        ]);

        Product::create([
            'category_id' => $hoodie->id,
            'name' => 'Hoodie Celugam Etnik Lampung Barat',
            'description' => 'Hoodie edisi budaya terinspirasi motif kain Celugam khas Sekala Brak Lampung Barat dengan corak warna oranye, hitam, dan putih geometris yang ikonik.',
            'price' => 220000,
            'stock' => 18,
            'image' => 'images/products/hoodie-celugam-lampung.jpg',
        ]);

        Product::create([
            'category_id' => $hoodie->id,
            'name' => 'Hoodie Jung Etnik Lampung',
            'description' => 'Hoodie kasual dengan ilustrasi perahu Jung (kapal khas Lampung) dan ornamen mahkota Siger. Dilengkapi saku kanguru besar dan tali serut tebal berkualitas.',
            'price' => 195000,
            'stock' => 22,
            'image' => 'images/products/hoodie-jung-lampung.jpg',
        ]);

        Product::create([
            'category_id' => $hoodie->id,
            'name' => 'Hoodie Zipper Tapis Modern',
            'description' => 'Hoodie beresleting full-zip dengan variasi kain motif Tapis Lampung pada hoodie bagian dalam dan saku samping. Resleting metalik kokoh dan tahan lama.',
            'price' => 230000,
            'stock' => 15,
            'image' => 'images/products/hoodie-zipper-tapis.jpg',
        ]);

        // ---- JAKET KHAS LAMPUNG (4 produk) ----
        Product::create([
            'category_id' => $jaket->id,
            'name' => 'Jaket Bomber Kombinasi Tapis',
            'description' => 'Jaket bomber kasual berbahan parasut taslan anti air dengan kombinasi bordir Tapis Lampung emas di dada dan lengan. Gaya sporty berpadu kearifan lokal.',
            'price' => 265000,
            'stock' => 15,
            'image' => 'images/products/jaket-bomber-tapis.jpg',
        ]);

        Product::create([
            'category_id' => $jaket->id,
            'name' => 'Outer Blazer Tapis Modern Lampung',
            'description' => 'Blazer outer etnik modern dengan balutan corak Tapis Lampung khas. Sangat elegan untuk menghadiri seminar, wisuda, peresmian, hingga resepsi pernikahan.',
            'price' => 295000,
            'stock' => 12,
            'image' => 'images/products/outer-tapis-lampung.jpg',
        ]);

        Product::create([
            'category_id' => $jaket->id,
            'name' => 'Jaket Denim Bordir Siger',
            'description' => 'Jaket jeans denim 13.5 oz warna bio-wash dengan bordir besar mahkota Siger Lampung di bagian punggung. Tampil maskulin, edgy, dan bangga dengan produk Lampung.',
            'price' => 275000,
            'stock' => 16,
            'image' => 'images/products/jaket-denim-siger.jpg',
        ]);

        Product::create([
            'category_id' => $jaket->id,
            'name' => 'Jaket Windbreaker Etnik Lampung',
            'description' => 'Jaket windbreaker tahan angin dengan aksen striping motif tapis reflektif yang menyala saat terkena cahaya. Cocok untuk pengendara motor dan olahraga malam.',
            'price' => 225000,
            'stock' => 20,
            'image' => 'images/products/jaket-windbreaker-lampung.jpg',
        ]);

        // ---- CELANA & BAWAHAN (4 produk) ----
        Product::create([
            'category_id' => $celana->id,
            'name' => 'Celana Batik Corak Tapis Lampung',
            'description' => 'Celana panjang etnik dengan motif batik corak tapis khas Lampung. Berbahan katun primis yang halus, adem, dan cocok dipadukan dengan kemeja maupun kaos polos.',
            'price' => 165000,
            'stock' => 25,
            'image' => 'images/products/celana-batik-etnik.jpg',
        ]);

        Product::create([
            'category_id' => $celana->id,
            'name' => 'Celana Chino Slim Fit RonaWear',
            'description' => 'Celana chino panjang berbahan katun twill stretch premium. Nyaman bergerak bebas seharian, sangat serasi dipadukan dengan kemeja Tapis maupun kaos Lampung.',
            'price' => 155000,
            'stock' => 35,
            'image' => 'images/products/celana-chino-lampung.jpg',
        ]);

        Product::create([
            'category_id' => $celana->id,
            'name' => 'Celana Jogger Kasual Lampung',
            'description' => 'Celana jogger sporty kasual dengan bahan baby terry lembut dan aksen saku samping dengan jahitan kuat. Pilihan santai harian mahasiswa dan pemuda Lampung.',
            'price' => 140000,
            'stock' => 30,
            'image' => 'images/products/celana-jogger-etnik.jpg',
        ]);

        Product::create([
            'category_id' => $celana->id,
            'name' => 'Celana Jeans Denim Klasik RonaWear',
            'description' => 'Celana jeans denim reguler fit dengan kualitas jahitan rantai rapi khas konveksi PT Zidan Pakaian Lampung. Kuat, awet bertahun-tahun, dan fleksibel dipakai kemanapun.',
            'price' => 199000,
            'stock' => 25,
            'image' => 'images/products/celana-jeans-lampung.jpg',
        ]);
    }
}
