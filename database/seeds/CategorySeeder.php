<?php

use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $array = [
            [
                'name' => 'Удилище',
                'children' => [
                    ['name' => 'Спиннинговые '],
                    ['name' => 'Маховые '],
                    ['name' => 'Фидерные '],
                    ['name' => 'Болонские '],
                    ['name' => 'Кастинговые '],
                    ['name' => 'Cбирулино '],
                    ['name' => 'Карповые '],
                    ['name' => 'Матчевые '],
                ]
            ],
            [
                'name' => 'Приманки',
                'children' => [
                    ['name' => 'Воблеры '],
                    ['name' => 'Мормышки '],
                    ['name' => 'БЛЕСНЫ '],
                    ['name' => 'ДЖИГОВЫЕ '],
                    ['name' => 'МЫШИ '],
                    ['name' => 'СИЛИКОНОВЫЕ '],
                    ['name' => 'ЛЯГУШКИ '],
                    ['name' => 'НАЖИВКА '],
                ]
            ],
            [
                'name' => 'Рыболовные снасти',
                'children' => [
                    ['name' => 'ОСНАСТКИ '],
                    ['name' => 'ГОТОВЫЕ СНАСТИ '],
                    ['name' => 'ИНСТРУМЕНТЫ '],
                    ['name' => 'ВСЁ ДЛЯ ВЯЗАНИЯ МУШЕК '],
                    ['name' => 'ПОДСАКИ, САДКИ '],
                    ['name' => 'ДЕРЖАТЕЛИ УДИЛИЩ '],
                    ['name' => 'РАЗНОЕ-ПОЛЕЗНОЕ '],
                ]
            ],
            [
                'name' => 'Снаряжение',
                'children' => [
                    ['name' => 'Лодки '],
                    ['name' => 'Насосы '],
                    ['name' => 'СПАС ЖИЛЕТЫ '],
                    ['name' => 'АКСЕССУАРЫ ДЛЯ НАСОСОВ '],
                    ['name' => 'СИДЕНЬЯ ДЛЯ ЛОДОК '],
                    ['name' => 'ДЕРЖАТЕЛИ УДИЛИЩ '],
                    ['name' => 'РАЗНОЕ-ПОЛЕЗНОЕ '],
                ]
            ],
        ];

        foreach ($array as $item){
            $category = \App\Category::create([
                'parent_id' => 0,
                'name' => $item['name'],
                'priority' => 0,
            ]);
            foreach ($item['children'] as $child){
                \App\Category::create([
                    'parent_id' => $category->id,
                    'name' => $child['name'],
                    'priority' => 0,
                ]);
            }
        }
    }
}
