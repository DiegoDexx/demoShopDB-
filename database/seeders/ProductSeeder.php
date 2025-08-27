<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Product;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $states = ['Como nuevo', 'En buen estado', 'Funcional'];

        Product::create([
            'name' => 'iPhone 8 64GB',
            'description' => 'iPhone 8 con pantalla Retina HD de 4.7 pulgadas, chip A11 Bionic, cámara de 12 MP y cuerpo de vidrio. Ideal para usuarios que buscan un dispositivo confiable y compacto.',
            'image' => 'iPhone8.jpg',
            'category' => 'Smartphones',
            'state' => $states[array_rand($states)],
            'color' => 'Space Gray',
            'brand' => 'Apple',
            'price' => 180.00,
            'stock' => 100,
        ]);

        Product::create([
            'name' => 'iPhone 8 Plus 256GB',
            'description' => 'Versión mejorada del iPhone 8 con pantalla de 5.5 pulgadas, cámara dual de 12 MP y batería de mayor duración. Aún potente para uso cotidiano y redes sociales.',
            'image' => 'iPhone8Plus.jpg',
            'category' => 'Smartphones',
            'state' => $states[array_rand($states)],
            'color' => 'Gold',
            'brand' => 'Apple',
            'price' => 220.00,
            'stock' => 80,
        ]);

        Product::create([
            'name' => 'iPhone X 256GB',
            'description' => 'Primer iPhone con pantalla OLED y diseño sin botón Home. Face ID, chip A11 Bionic y cámara dual. Buen equilibrio entre rendimiento y diseño moderno.',
            'image' => 'iPhoneX.jpg',
            'category' => 'Smartphones',
            'state' => $states[array_rand($states)],
            'color' => 'Silver',
            'brand' => 'Apple',
            'price' => 260.00,
            'stock' => 50,
        ]);

        Product::create([
            'name' => 'iPhone XR 128GB',
            'description' => 'iPhone XR ofrece una excelente autonomía, chip A12 Bionic, y una pantalla LCD Liquid Retina de 6.1 pulgadas. Perfecto para quienes buscan potencia a buen precio.',
            'image' => 'iPhoneXR.jpg',
            'category' => 'Smartphones',
            'state' => $states[array_rand($states)],
            'color' => 'Blue',
            'brand' => 'Apple',
            'price' => 290.00,
            'stock' => 70,
        ]);

        Product::create([
            'name' => 'iPhone XS 256GB',
            'description' => 'Diseño premium en acero inoxidable, pantalla OLED de 5.8", cámara dual y alto rendimiento gracias al chip A12 Bionic. Muy buscado por su tamaño compacto y potencia.',
            'image' => 'iPhoneXS.jpg',
            'category' => 'Smartphones',
            'state' => $states[array_rand($states)],
            'color' => 'Space Gray',
            'brand' => 'Apple',
            'price' => 320.00,
            'stock' => 60,
        ]);

        Product::create([
            'name' => 'iPhone XS Max 512GB',
            'description' => 'El iPhone XS Max cuenta con pantalla OLED de 6.5 pulgadas, gran batería y alto rendimiento. Excelente opción para multimedia y fotografía avanzada.',
            'image' => 'iPhoneXSMax.jpg',
            'category' => 'Smartphones',
            'state' => $states[array_rand($states)],
            'color' => 'Gold',
            'brand' => 'Apple',
            'price' => 350.00,
            'stock' => 40,
        ]);

        Product::create([
            'name' => 'Galaxy S20 128GB',
            'description' => 'Galaxy S20 con pantalla Dynamic AMOLED de 6.2", cámara triple con zoom híbrido, y gran potencia gracias al Exynos 990/Snapdragon 865. Excelente en fotos y videos.',
            'image' => 'GalaxyS20.jpg',
            'category' => 'Smartphones',
            'state' => $states[array_rand($states)],
            'color' => 'Cloud Blue',
            'brand' => 'Samsung',
            'price' => 300.00,
            'stock' => 90,
        ]);

        Product::create([
            'name' => 'Galaxy S20+ 256GB',
            'description' => 'Versión con pantalla de 6.7", excelente batería y rendimiento multitarea. Ideal para usuarios exigentes que buscan una experiencia fluida y cámara de calidad.',
            'image' => 'GalaxyS20Plus.jpg',
            'category' => 'Smartphones',
            'state' => $states[array_rand($states)],
            'color' => 'Cosmic Black',
            'brand' => 'Samsung',
            'price' => 330.00,
            'stock' => 70,
        ]);

        Product::create([
            'name' => 'Galaxy S20 Ultra 512GB',
            'description' => 'Edición premium del S20 con zoom 100x, pantalla de 6.9" y batería de 5000 mAh. Aún competitivo en fotografía y rendimiento general.',
            'image' => 'GalaxyS20Ultra.jpg',
            'category' => 'Smartphones',
            'state' => $states[array_rand($states)],
            'color' => 'Cosmic Gray',
            'brand' => 'Samsung',
            'price' => 380.00,
            'stock' => 50,
        ]);

        Product::create([
            'name' => 'Galaxy S21 256GB',
            'description' => 'Modelo 2021 con diseño refinado, gran rendimiento y cámaras versátiles. Ideal para redes sociales, gaming y contenido multimedia.',
            'image' => 'GalaxyS21.jpg',
            'category' => 'Smartphones',
            'state' => $states[array_rand($states)],
            'color' => 'Phantom Gray',
            'brand' => 'Samsung',
            'price' => 370.00,
            'stock' => 100,
        ]);

        Product::create([
            'name' => 'Galaxy S21 Ultra 512GB',
            'description' => 'Pantalla de 6.8", zoom espacial 100x, soporte para S-Pen y excelente autonomía. Uno de los mejores smartphones Android de su generación.',
            'image' => 'GalaxyS21Ultra.jpg',
            'category' => 'Smartphones',
            'state' => $states[array_rand($states)],
            'color' => 'Phantom Silver',
            'brand' => 'Samsung',
            'price' => 450.00,
            'stock' => 40,
        ]);

        Product::create([
            'name' => 'Galaxy S23 Ultra 512GB',
            'description' => 'Smartphone insignia de Samsung con cámara de 200 MP, chip Snapdragon 8 Gen 2, y pantalla AMOLED de 120 Hz. Alto rendimiento para usuarios profesionales.',
            'image' => 'GalaxyS23Ultra.jpg',
            'category' => 'Smartphones',
            'state' => $states[array_rand($states)],
            'color' => 'Phantom Black',
            'brand' => 'Samsung',
            'price' => 700.00,
            'stock' => 30,
        ]);

        Product::create([
            'name' => 'iPhone 15 128GB',
            'description' => 'iPhone 15 con USB-C, chip A16 Bionic, y cámara principal mejorada. Ideal para usuarios que buscan tecnología reciente a menor precio de lanzamiento.',
            'image' => 'iPhone15.jpg',
            'category' => 'Smartphones',
            'state' => $states[array_rand($states)],
            'color' => 'Pink',
            'brand' => 'Apple',
            'price' => 750.00,
            'stock' => 50,
        ]);

        Product::create([
            'name' => 'iPhone 15 Pro Max 512GB',
            'description' => 'El modelo más avanzado de Apple con cámara periscópica, titanio, chip A17 Pro y pantalla de 6.7 pulgadas. Excelente para productividad y creación de contenido.',
            'image' => 'iPhone15ProMax.jpg',
            'category' => 'Smartphones',
            'state' => $states[array_rand($states)],
            'color' => 'Natural Titanium',
            'brand' => 'Apple',
            'price' => 950.00,
            'stock' => 30,
        ]);

        Product::create([
            'name' => 'Galaxy S24 256GB',
            'description' => 'El más reciente Galaxy con mejoras en inteligencia artificial, cámara mejorada y duración de batería optimizada. Ideal para quienes buscan lo último en Android.',
            'image' => 'GalaxyS24.jpg',
            'category' => 'Smartphones',
            'state' => $states[array_rand($states)],
            'color' => 'Phantom Silver',
            'brand' => 'Samsung',
            'price' => 850.00,
            'stock' => 25,
        ]);
    }
}
