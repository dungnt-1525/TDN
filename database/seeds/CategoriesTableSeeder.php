<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Category;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Schema::disableForeignKeyConstraints();
        
        DB::table('categories')->truncate();
        
        DB::table('categories')->insert([
            'name' => 'Phòng ngủ',
            'slug' => 'phong-ngu',
            'parent_id' => null,
            'created_at' => date('y-m-d H:i:s'),
            'updated_at' => date('y-m-d H:i:s'),
        ]);
        
        DB::table('categories')->insert([
            'name' => 'Sofa',
            'slug' => 'sofa',
            'parent_id' => null,
            'created_at' => date('y-m-d H:i:s'),
            'updated_at' => date('y-m-d H:i:s'),
        ]);
        
        DB::table('categories')->insert([
            'name' => 'Phòng bếp',
            'slug' => 'phong-bep',
            'parent_id' => null,
            'created_at' => date('y-m-d H:i:s'),
            'updated_at' => date('y-m-d H:i:s'),
        ]);
        
        DB::table('categories')->insert([
            'name' => 'Phòng trẻ em',
            'slug' => 'phong-tre-em',
            'parent_id' => null,
            'created_at' => date('y-m-d H:i:s'),
            'updated_at' => date('y-m-d H:i:s'),
        ]);
        DB::table('categories')->insert([
            'name' => 'Thiết bị bếp',
            'slug' => 'thiet-bi-bep',
            'parent_id' => null,
            'created_at' => date('y-m-d H:i:s'),
            'updated_at' => date('y-m-d H:i:s'),
        ]);
        DB::table('categories')->insert([
            'name' => 'Thiết bị vệ sinh',
            'slug' => 'thiet-bi-ve-sinh',
            'parent_id' => null,
            'created_at' => date('y-m-d H:i:s'),
            'updated_at' => date('y-m-d H:i:s'),
        ]);
        DB::table('categories')->insert([
            'name' => 'Đồ trang trí',
            'slug' => 'do-trang-tri',
            'parent_id' => null,
            'created_at' => date('y-m-d H:i:s'),
            'updated_at' => date('y-m-d H:i:s'),
        ]);
        DB::table('categories')->insert([
            'name' => 'Phụ kiện bếp',
            'slug' => 'phu-kien-bep',
            'parent_id' => null,
            'created_at' => date('y-m-d H:i:s'),
            'updated_at' => date('y-m-d H:i:s'),
        ]);
        DB::table('categories')->insert([
            'name' => 'Nhà thông minh',
            'slug' => 'nha-thong-minh',
            'parent_id' => null,
            'created_at' => date('y-m-d H:i:s'),
            'updated_at' => date('y-m-d H:i:s'),
        ]);
        DB::table('categories')->insert([
            'name' => 'Bàn ghế gỗ',
            'slug' => 'ban-ghe-go',
            'parent_id' => 1,
            'created_at' => date('y-m-d H:i:s'),
            'updated_at' => date('y-m-d H:i:s'),
        ]);
        DB::table('categories')->insert([
            'name' => 'Sofa phòng khách',
            'slug' => 'sofa-phong-khach',
            'parent_id' => 1,
            'created_at' => date('y-m-d H:i:s'),
            'updated_at' => date('y-m-d H:i:s'),
        ]);
        DB::table('categories')->insert([
            'name' => 'Tủ để giày',
            'slug' => 'tu-de-giay',
            'parent_id' => 1,
            'created_at' => date('y-m-d H:i:s'),
            'updated_at' => date('y-m-d H:i:s'),
        ]);
        DB::table('categories')->insert([
            'name' => 'Tủ rượu',
            'slug' => 'tu-ruou',
            'parent_id' => 1,
            'created_at' => date('y-m-d H:i:s'),
            'updated_at' => date('y-m-d H:i:s'),
        ]);
        DB::table('categories')->insert([
            'name' => 'Vách ngăn',
            'slug' => 'vach-ngan',
            'parent_id' => 1,
            'created_at' => date('y-m-d H:i:s'),
            'updated_at' => date('y-m-d H:i:s'),
        ]);
        DB::table('categories')->insert([
            'name' => 'Giường ngủ',
            'slug' => 'giuong-ngu',
            'parent_id' => 2,
            'created_at' => date('y-m-d H:i:s'),
            'updated_at' => date('y-m-d H:i:s'),
        ]);
        DB::table('categories')->insert([
            'name' => 'Kệ tivi',
            'slug' => 'ke-tivi',
            'parent_id' => 2,
            'created_at' => date('y-m-d H:i:s'),
            'updated_at' => date('y-m-d H:i:s'),
        ]);
        DB::table('categories')->insert([
            'name' => 'Bàn trang điểm',
            'slug' => 'ban-trang-diem',
            'parent_id' => 2,
            'created_at' => date('y-m-d H:i:s'),
            'updated_at' => date('y-m-d H:i:s'),
        ]);
        DB::table('categories')->insert([
            'name' => 'Bàn làm việc',
            'slug' => 'ban-lam-viec',
            'parent_id' => 2,
            'created_at' => date('y-m-d H:i:s'),
            'updated_at' => date('y-m-d H:i:s'),
        ]);
        DB::table('categories')->insert([
            'name' => 'Tủ quần áo',
            'slug' => 'tu-quan-ao',
            'parent_id' => 2,
            'created_at' => date('y-m-d H:i:s'),
            'updated_at' => date('y-m-d H:i:s'),
        ]);

        Schema::enableForeignKeyConstraints();
    }
}
