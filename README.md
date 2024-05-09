<p align="center" >
  <b>POINT UTAMA</b>
</p>

---

> #### INSTALASI
> - PHP 8.1.0
> - LARAVEL 10.0.3
>   ```
>   Composer Create-project laravel\laravel=v10.0.3 laravel-collection
>   ```
---
> #### APA ITU COLLECTION?
> - Collection adalah salah satu fitur dari framework Laravel yang berguna untuk memanipulasi data dengan kejelasan dan efesiensi.
>
> Berikut kode membuat collection :
> ```
>  $collection = collect([1, 2, 3]);
>  $this->assertEqualsCanonicalizing([1, 2, 3], $collection->all());
> ```
> #### FOREACH
> - forEach dalam Laravel Collection adalah metode untuk melakukan iterasi pada setiap item dalam koleksi data tanpa mengubah koleksi itu sendiri. Ini memungkinkan Anda untuk menjalankan fungsi pada setiap elemen dalam koleksi dengan gaya sintaks yang bersih dan mudah dibaca.
>
> berikut kode membuat collection :
> Berikut contoh foreach pada laravel collection :
>
> ```
> $collection = collect([1, 2, 3, 4, 5, 6, 7, 8, 9]);
> foreach ($collection as $key => $value) {
>     $this->assertEquals($key + 1, $value);
> }
> ```
>
> #### MANIPULASI COLLECTION
> - Manipulasi Collection dalam Laravel Collection adalah proses menggunakan metode bawaan seperti filter, map, sortBy, dan lainnya untuk mengubah, menyaring, atau mengurutkan data dalam koleksi dengan cara yang jelas dan efisien.
>
> Berikut contoh kode manipulasi collection :
> ```
> $collection = collect([]);
> $collection->push(1, 2, 3);
> $this->assertEqualsCanonicalizing([1, 2, 3], $collection->all());
>
> $result = $collection->pop();
> $this->assertEquals(3, $result);
> $this->assertEqualsCanonicalizing([1, 2], $collection->all());
> ```
>
> #### MAPPING
> - Mapping dalam Laravel Collection adalah proses mengubah setiap elemen dalam koleksi dengan menggunakan fungsi tertentu dan mengembalikan koleksi baru yang berisi hasil transformasi tersebut.
> - Dengan ```map()```, Anda dapat menerapkan fungsi pada setiap item dalam koleksi dan menghasilkan koleksi baru dengan nilai-nilai yang telah dimodifikasi sesuai dengan fungsi tersebut.
>
> Berikut salah satu contoh kode mapping :
> ```
> $collection = collect([1, 2, 3]);
> $result = $collection->map(function ($item) {
>     return $item * 2;
> });
> $this->assertEqualsCanonicalizing([2, 4, 6], $result->all());
> ```
> #### ZIPPING
> - Zipping dalam Laravel Collection adalah proses menggabungkan dua koleksi secara sejajar, membentuk pasangan nilai dari setiap koleksi untuk membuat koleksi baru. Ini dilakukan dengan metode ```zip()```.
>
> Berikut contoh kode zipping :
>
> ```
> $collection1 = collect([1, 2, 3]);
> $collection2 = collect([4, 5, 6]);
> $collection3 = $collection1->zip($collection2);
>
> $this->assertEquals([
> collect([1, 4]),
> collect([2, 5]),
> collect([3, 6]),
> ], $collection3->all());
> ```
---
> #### CONCAT
> - Concat Menggabungkan dua atau lebih data yang berupa string.
>
> Berikut contoh kode concat :
> ```
> $collection1 = collect([1, 2, 3]);
> $collection2 = collect([4, 5, 6]);
> $collection3 = $collection1->concat($collection2);
>
> $this->assertEqualsCanonicalizing([1, 2, 3, 4, 5, 6], $collection3->all());
> ```
> #### STRING REPRESENTATION
> - String Representation dalam Laravel Collection adalah cara di mana koleksi ditampilkan sebagai string. Biasanya, elemen-elemen koleksi dipisahkan oleh koma dan diapit oleh tanda kurung kotak. Misalnya, koleksi ```[1, 2, 3]``` akan direpresentasikan sebagai ```"[1, 2, 3]"```. Ini berguna untuk debugging dan pencetakan.
>
> #### FILTERING
> - Filtering dalam Laravel Collection adalah proses memilih elemen-elemen tertentu dari koleksi berdasarkan kriteria yang ditentukan. Misalnya, Anda dapat menyaring elemen-elemen yang memenuhi kondisi tertentu, seperti elemen-elemen dengan nilai lebih besar dari suatu angka.
>
> Berikut contoh salah satu kode filtering :
> ```
> $collection = collect([1, 2, 3, 4, 5, 6, 7, 8, 9, 10]);
> $result = $collection->filter(function ($value, $key) {
> return $value % 2 == 0;
> });
>
> $this->assertEqualsCanonicalizing([2, 4, 6, 8, 10], $result->all());
> ```
>
> #### PARTITIONING
> - Partitioning dalam Laravel Collection adalah proses membagi koleksi menjadi dua kelompok berdasarkan kriteria tertentu. Misalnya, Anda dapat membagi koleksi menjadi kelompok elemen yang memenuhi kondisi tertentu dan kelompok lainnya yang tidak memenuhi kondisi tersebut.
>
> Berikut contoh kode partitioning :
> ```
> $collection = collect([
>     "Farel" => 100,
>     "Zeta" => 80,
>     "Takku" => 90
>  ]);
>
> [$result1, $result2] = $collection->partition(function ($value, $key) {
>     return $value >= 90;
> });
> ```
>
> #### TESTING
> - Testing dalam pengembangan perangkat lunak adalah proses untuk memverifikasi bahwa kode berfungsi seperti yang diharapkan
>
> Berikut contoh kode testing :
> ```
> $collection = collect(["Farel", "Mercys", "Thona"]);
> $this->assertTrue($collection->contains("Farel"));
> $this->assertTrue($collection->contains(function ($value, $key) {
>     return $value == "Thona";
> }));
> ```
>
> #### GROUPING
> - Grouping dalam Laravel Collection adalah proses mengelompokkan elemen-elemen koleksi berdasarkan kriteria tertentu, seperti properti atau hasil dari sebuah closure.
>
> Berikut contoh kode grouping :
> ```
> $collection = collect([
>     [
>         "name" => "Farel",
>         "department" => "IT"
>     ],
>     [
>         "name" => "Zeta",
>         "department" => "IT"
>     ],
>     [
>         "name" => "Takku",
>         "department" => "HR"
>     ]
> ]);
>
> $result = $collection->groupBy("department");
> ```
>
> #### AGGREGATE
> - Aggregation dalam Laravel Collection adalah proses pengumpulan atau perhitungan nilai-nilai dalam koleksi. Ini dapat dilakukan dengan metode-metode seperti sum(), avg(), max(), min(), dan count(), yang memungkinkan Anda untuk melakukan operasi agregasi dengan mudah.
>
> Berikut contoh kode aggregate :
> ```
> $collection = collect([1, 2, 3, 4, 5, 6, 7, 8, 9]);
> $result = $collection->sum();
> $this->assertEquals(45, $result);
>
> $result = $collection->avg();
> $this->assertEquals(5, $result);
>
> $result = $collection->min();
> $this->assertEquals(1, $result);
>
> $result = $collection->max();
> $this->assertEquals(9, $result);
> ```
>
> #### REDUCE
> - Metode reduce() dalam Laravel Collection digunakan untuk mereduksi koleksi menjadi satu nilai tunggal berdasarkan operasi yang ditentukan dalam fungsi callback. Dengan reduce(), Anda dapat melakukan operasi seperti menjumlahkan semua nilai atau menggabungkan string dalam koleksi.
>
> Berikut contoh kode reduce :
> ```
> $collection = collect([1, 2, 3, 4, 5, 6, 7, 8, 9]);
> $result = $collection->reduce(function ($carry, $item) {
>     return $carry + $item;
> });
> $this->assertEquals(45, $result);
> ```
>
> #### LAZY COLLECTION
> - Lazy Collection dalam Laravel adalah koleksi yang dievaluasi hanya saat dibutuhkan, tidak sekaligus. Ini membantu meningkatkan kinerja dengan menghindari evaluasi seluruh koleksi pada satu waktu.
>
> Berikut contoh kode lazy collection :
> ```
> $collection = LazyCollection::make(function () {
> $value = 0;
>
> while (true) {
>     yield $value;
>     $value++;
> }
> });
>
> $result = $collection->take(10);
> $this->assertEqualsCanonicalizing([0, 1, 2, 3, 4, 5, 6, 7, 8, 9], $result->all()); 
<p align="center" >
  <b>PERTANYAAN DAN CATATAN TAMBAHAN</b>
</p>
---
> - 
---
<p align="center" >
  <b>KESIMPULAN</b>
</p>
