
<style type="text/css">
    ol.c {list-style-type: upper-roman;}
    .images img{
        width: 500px;
    }
    .images2 img{
        width: 500px;
    }
    .images3 img{
        width: 600px;
    }
    h5
    {
        background: yellow;
    }
</style>
@extends('layouts.default')
@section('content')
    <div class="container">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h2 class="box-title">user manual</h2>
                    <h5>untuk memperjelas gambar silahkan arahkan kursor ke gambar lalu klik kanan dan pilih open image in new tab</h5>
                </div>
                <div class="card-body" >
                    @if(Auth::user()->level == 'public')
                     <div class="row">
                      <div class="col-4">
                        <div class="list-group" id="list-tab" role="tablist">
                          <a class="list-group-item list-group-item-action active" id="list-home-list" data-toggle="list" href="#list-home" role="tab" aria-controls="home"><i class="fas fa-user"></i> User</a>
                          <a class="list-group-item list-group-item-action" id="list-profile-list" data-toggle="list" href="#list-profile" role="tab" aria-controls="profile"><i class="fas fa-eye"></i> Mycomplain</a>
                          <a class="list-group-item list-group-item-action" id="list-messages-list" data-toggle="list" href="#list-messages" role="tab" aria-controls="messages"><i class="fa fa-fw fas fa-edit"></i> Create</a>
                          <a class="list-group-item list-group-item-action" id="list-settings-list" data-toggle="list" href="#list-settings" role="tab" aria-controls="settings"><i class="fas fa-trash"></i> Trash</a>
                          <a class="list-group-item list-group-item-action" id="list-auth-list" data-toggle="list" href="#list-auth" role="tab" aria-controls="auth"><i class="fas fa-user"></i> auth</a>
                        </div>
                      </div>
                      <div class="col-8">
                        <div class="tab-content" id="nav-tabContent">
                          <div class="tab-pane fade show active" id="list-home" role="tabpanel" aria-labelledby="list-home-list">
                            <ol class="c">
                              <li>User</li>
                                <ol>
                                    <li>di menu ini kita dapat melihat seluruh user dengan level public</li>
                                             <img src="{{asset('manual/user.png')}}">
                                    <li>kita dapat melihat seluruh user dengan level public</li>
                                        <div class="images">
                                            <img src="{{asset('manual/user_menu.png')}}">
                                        </div>
                                    <li>ketika kita menekan button biru (eye) pada tabel kita akan dapati apa saja yang telah user itu buat. data akan muncul dalam bentuk modal</li>
                                        <div class="images">
                                            <img src="{{asset('manual/user_window.png')}}">
                                        </div>
                                </ol>
                            </ol>
                          </div>
                          <div class="tab-pane fade" id="list-profile" role="tabpanel" aria-labelledby="list-profile-list">
                              <ol class="c">
                                  <li>my complain</li>
                                  <img src="{{asset('manual/complain.png')}}">
                                  <li>mycomplain berisi daftar complain yang telah kita buat</li>
                                  <div class="images">
                                  <img src="{{asset('manual/mycomplain.png')}}">
                                  </div>
                                  <ol>
                                      <li>pada bagian ini kita bisa melihat apakah complain yang kita buat sudah terkonfirmasi(sucess) atau masih menunggu(pending) atau malah ditolah (failed)</li>
                                      <div class="images">
                                          <img src="{{asset('manual/mycomplain_menu.png')}}">
                                      </div>
                                      <li>di bagian action kita bisa temukan 4 button dengan fungsi yang berbeda</li>
                                      <div>
                                          <img src="{{asset('manual/mycomplain_menu2.png')}}">
                                      </div>
                                      <ol>
                                          <li>untuk button yang berwarna putih(plus) di gunakan untuk menambahkan gambar pada complain yang kita buat, pada form ini terdapat validasi agar data yang kosong tidak ada di simpan ke database dan hanya iamage yang yang bisa di masukkan. is_default berarti foto itu akan di tampilkan bersama complain di halaman admin bukan sebagai galleri</li>
                                          <div class="images2">
                                              <img src="{{asset('manual/galleries_create.png')}}">
                                          </div>
                                          <li>pada button yang berwarna ungu(image) berisi foto-foto yang telah kita tambahkan pada compplain kita. is_default berarti foto itu akan di tampilkan bersama complain di halaman admin bukan sebagai galleri</li>
                                          <div class="images2">
                                              <img src="{{asset('manual/galleries_galleri.png')}}">
                                          </div>
                                          <li>untuk bntton berwarna kuning(pencil) berarti itu untuk mengedit data complain apabila terjadi kesalahan atupun perubahan</li>
                                          <div class="images2">
                                              <img src="{{asset('manual/complain_update.png')}}">
                                          </div>
                                          <li>untuk button merah(trash) berarti data akan di hapus, dan masuk ke dalam menu trash</li>
                                      </ol>
                                  </ol>
                              </ol>
                          </div>
                          <div class="tab-pane fade" id="list-messages" role="tabpanel" aria-labelledby="list-messages-list">
                              <ol class="c">
                                  <li>membuat data pengaduan dengan form faliasi</li>
                                  <div class="images3">
                                      <img src="{{'manual/create_complain.png'}}">
                                  </div>
                              </ol>
                          </div>
                          <div class="tab-pane fade" id="list-settings" role="tabpanel" aria-labelledby="list-settings-list">
                              <ol class="c">
                                  <li>trash berfungsi untuk menmpung data yang telah di hapus sebelum di hapus permanen atau di restore</li>
                                  <div class="images">
                                      <img src="{{asset('manual/complain_trash.png')}}">
                                  </div>
                              </ol>
                          </div>
                           <div class="tab-pane fade" id="list-auth" role="tabpanel" aria-labelledby="list-auth-list">
                              <ol class="c">
                                  <li>auth berfungsi untuk mengganti data tata kita. lokasinya berada di pojok kanan atas</li>
                                  <div class="images">
                                      <img src="{{asset('manual/auth.png')}}">
                                  </div>
                              </ol>
                          </div>
                        </div>
                      </div>
                    </div>
                    @endif

                    @if(Auth::user()->level == 'admin')
                     <div class="row">
                      <div class="col-4">
                        <div class="list-group" id="list-tab" role="tablist">
                          <a class="list-group-item list-group-item-action active" id="list-home-list" data-toggle="list" href="#list-home" role="tab" aria-controls="home"><i class="fas fa-user"></i> User</a>
                          <a class="list-group-item list-group-item-action" id="list-profile-list" data-toggle="list" href="#list-profile" role="tab" aria-controls="profile"><i class="fas fa-fw fa-user-plus"></i> create</a>
                          <a class="list-group-item list-group-item-action" id="list-messages-list" data-toggle="list" href="#list-messages" role="tab" aria-controls="messages"><i class="fa fa-fw fas fa-trash"></i> trash</a>
                          <a class="list-group-item list-group-item-action" id="list-settings-list" data-toggle="list" href="#list-settings" role="tab" aria-controls="settings"><i class="fas fa-info-circle"></i> complain</a>
                          <a class="list-group-item list-group-item-action" id="list-auth-list" data-toggle="list" href="#list-auth" role="tab" aria-controls="auth"><i class="fas fa-print"></i> cetak</a>
                        </div>
                      </div>
                      <div class="col-8">
                        <div class="tab-content" id="nav-tabContent">
                          <div class="tab-pane fade show active" id="list-home" role="tabpanel" aria-labelledby="list-home-list">
                            <ol class="c">
                              <li>User</li>
                                <ol>
                                    <li>di menu ini kita dapat melihat seluruh user </li>
                                             <img src="{{asset('manual/admin_user.png')}}">
                                    <li>kita dapat melihat seluruh user dengan semua level</li>
                                        <div class="images">
                                            <img src="{{asset('manual/admin_user_info.png')}}">
                                        </div>
                                    <li>pada halaman admin kita dapat mendelete data semua user</li>
                                </ol>
                            </ol>
                          </div>
                          <div class="tab-pane fade" id="list-profile" role="tabpanel" aria-labelledby="list-profile-list">
                              <ol class="c">
                                  <li>memubat register untuk admin / officer baru</li>
                                    <div class="images">
                                        <img src="{{asset('manual/admin_create.png')}}">
                                    </div>
                              </ol>
                          </div>
                          <div class="tab-pane fade" id="list-messages" role="tabpanel" aria-labelledby="list-messages-list">
                              <ol class="c">
                                  <li>data user yang telah di delete dapat kita restore dengan menekan tombol berwarna kuning ataupun delete permanen dengan menekan tombol berwarna merah</li>
                                  <div class="images3">
                                      <img src="{{'manual/admin_trash.png'}}">
                                  </div>
                              </ol>
                          </div>
                          <div class="tab-pane fade" id="list-settings" role="tabpanel" aria-labelledby="list-settings-list">
                              <ol class="c">
                                  <li>menampilkan data complain berdasarkan tanggal terbaru</li>
                                  <div class="images">
                                      <img src="{{asset('manual/admin_complain_info.png')}}">
                                  </div>
                                  <li>pada action terdapar beberapa tombol</li>
                                    <div>
                                        <img src="{{asset('manual/admin_complain_info_button.png')}}">
                                    </div>
                                    <ol>
                                        <li>tombol hijau menandakan data telah terkonfirmasi</li>
                                        <li>tombol kuning menandakan data tidak di konfirmasi</li>
                                        <li>tombol biru untuk melihat data</li>
                                            <div class="images">
                                                <img src="{{asset('manual/admin_complain_jendela.png')}}">
                                            </div>
                                            <ol>
                                                <li>tombol info berguna untuk melihat detail info dari data complain</li>
                                                <div class="images">
                                                    <img src="{{asset('manual/cetakdata.png')}}">
                                                </div>
                                                <li>tombol cetak data akan mencetak semua data dari user yang buat data tersebut</li>
                                                <div>
                                                    <img src="{{asset('manual/cetakdata2.png')}}">
                                                </div>
                                            </ol>
                                        <li>tombol merah untuk mendelet data</li>
                                    </ol>
                              </ol>
                          </div>
                           <div class="tab-pane fade" id="list-auth" role="tabpanel" aria-labelledby="list-auth-list">
                              <ol class="c">
                                  <li>auth berfungsi untuk mengganti data tata kita. lokasinya berada di pojok kanan atas</li>
                                  <div class="images">
                                      <img src="{{asset('manual/auth.png')}}">
                                  </div>
                              </ol>
                          </div>
                        </div>
                      </div>
                    </div>
                    @endif


                    @if(Auth::user()->level == 'officer')
                     <div class="row">
                      <div class="col-4">
                        <div class="list-group" id="list-tab" role="tablist">
                          <a class="list-group-item list-group-item-action active" id="list-home-list" data-toggle="list" href="#list-home" role="tab" aria-controls="home"><i class="fas fa-user"></i> User</a>
                          <a class="list-group-item list-group-item-action" id="list-settings-list" data-toggle="list" href="#list-settings" role="tab" aria-controls="settings"><i class="fas fa-info-circle"></i> complain</a>
                           <a class="list-group-item list-group-item-action" id="list-auth-list" data-toggle="list" href="#list-auth" role="tab" aria-controls="auth"><i class="fas fa-user"></i> auth</a>
                        </div>
                      </div>
                      <div class="col-8">
                        <div class="tab-content" id="nav-tabContent">
                          <div class="tab-pane fade show active" id="list-home" role="tabpanel" aria-labelledby="list-home-list">
                            <ol class="c">
                              <li>User</li>
                                <ol>
                                    <li>di menu ini kita dapat melihat user dengan level public </li>
                                             <img src="{{asset('manual/user.png')}}">
                                    <li>kita dapat melihat seluruh user dengan semua level</li>
                                        <div class="images">
                                            <img src="{{asset('manual/admin_user_info.png')}}">
                                        </div>
                                    <li>pada halaman admin kita dapat mendelete data semua user</li>
                                </ol>
                            </ol>
                          </div>
                           <div class="tab-pane fade" id="list-auth" role="tabpanel" aria-labelledby="list-auth-list">
                              <ol class="c">
                                  <li>auth berfungsi untuk mengganti data tata kita. lokasinya berada di pojok kanan atas</li>
                                  <div class="images">
                                      <img src="{{asset('manual/auth.png')}}">
                                  </div>
                              </ol>
                          </div>
                        </div>
                      </div>
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
 
 
@endsection


