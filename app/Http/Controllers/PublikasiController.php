<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Publikasi;
use App\Models\Mahasiswa;
use App\Models\Dosen;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Validator;
use Symfony\Component\DomCrawler\Crawler;
use GuzzleHttp\Client;

class PublikasiController extends Controller
{
    public function index()
    {
        $publikasi = Publikasi::all();
        $mahasiswa = Mahasiswa::all();
        $dosen = Dosen::all();
        
        return view('admin.data_publikasi', [
            'data_publikasi' => $publikasi,
            'mahasiswas' => $mahasiswa,
            'dosens' => $dosen,
            'title' => 'Data Publikasi'
        ]);

    }

    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required',
            'penerbit' => 'required',
            'jurnal' => 'required',
            'tanggal_terbit' => 'required',
            'mahasiswas' => 'array',
            'dosens' => 'array',
            // 'tags' => 'required',
        ]);

        // $tags = explode(",", $request->tags);

        $publication = Publikasi::create([
            'judul' => $request->judul,
            'penerbit' => $request->penerbit,
            'jurnal' => $request->jurnal,
            'tanggal_terbit' => $request->tanggal_terbit,
            'halaman' => $request->halaman,
            'volume' => $request->volume,
            'url'   => $request->url,
        ]);

        // $publication->tag($tags);
        $publication->mahasiswas()->attach($request->mahasiswas);
        $publication->dosens()->attach($request->dosens);

        Alert::success('Success', 'Berhasil menambah data publikasi');
        return redirect()->back();
    }

    public function destroy($id)
    {
        $publication = Publikasi::find($id);
        $publication->mahasiswas()->detach();
        $publication->dosens()->detach();
        $publication->delete();

        Alert::success('Success', 'Berhasil menghapus data publikasi');
        return redirect()->back();
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'judul' => 'required',
            'penerbit' => 'required',
            'jurnal' => 'required',
            'tanggal_terbit' => 'required',
            'mahasiswas' => 'array',
            'dosens' => 'array',
        ]);

        $publication = Publikasi::find($id);

        $publication->update([
            'judul' => $request->judul,
            'penerbit' => $request->penerbit,
            'jurnal' => $request->jurnal,
            'tanggal_terbit' => $request->tanggal_terbit,
            'halaman' => $request->halaman,
            'volume' => $request->volume,
            'url'   => $request->url,
        ]);

        $publication->mahasiswas()->sync($request->mahasiswas);
        $publication->dosens()->sync($request->dosens);

        Alert::success('Success', 'Berhasil mengubah data publikasi');
        return redirect()->back();
    }

    // public function fetchData(Request $request)
    // {
    //     // Validasi URL
    //     $validator = Validator::make($request->all(), [
    //         'url' => 'required|url',
    //     ]);

    //     if ($validator->fails()) {
    //         return response()->json(['error' => 'Invalid URL'], 400);
    //     }

    //     $url = $request->input('url');

    //     // Gunakan Guzzle untuk mengambil data dari URL
    //     $client = new Client();
    //     $response = $client->get($url);
    //     $html = $response->getBody()->getContents();

    //     // Lakukan parsing HTML dengan DOMDocument dan DOMXPath
    //     $dom = new \DOMDocument();
    //     libxml_use_internal_errors(true);
    //     $dom->loadHTML($html);
    //     libxml_clear_errors();

    //     // Gunakan DOMXPath untuk menavigasi dalam dokumen HTML
    //     $xpath = new \DOMXPath($dom);

    //     // Contoh: Ambil judul dari tag <title>
    //     $titleNodeList = $xpath->query('//title');
    //     $judul = $titleNodeList->length > 0 ? $titleNodeList->item(0)->nodeValue : 'Judul Tidak Ditemukan';

    //     // Contoh: Ambil nama jurnal dari elemen dengan class 'journal'
    //     $journalNodeList = $xpath->query('//div[@class="csl-entry"]');
    //     $jurnal = $journalNodeList->length > 0 ? $journalNodeList->item(0)->nodeValue : 'Jurnal Tidak Ditemukan';

    //     // ... Lanjutkan dengan mengambil data lain sesuai kebutuhan

    //     $parts = explode('. ', $jurnal);

    //     // Extracting data
    //     $authors = $parts[0];  // author
    //     $title = $parts[1];    // Title
    //     $journalInfo = $parts[2];  // Journal
    //     $doi = $parts[3];     // "https://doi.org/10.36080/kresna.v3i1.59"

    //     // Extracting more details
    //     list($journal, $volume, $pages) = explode(', ', $journalInfo);

    //     // Extract volume and pages
    //     list($volume, $pages) = explode('(', $volume);
    //     $pages = rtrim($pages, ')');

    //     // Format data yang diambil dari parsing HTML
    //     $data = [
    //         'judul' => $judul,
    //         'jurnal' => $journal,
    //         'volume' => $volume,
    //         'halaman' => $pages
    //         // ... Tambahkan data lain sesuai kebutuhan
    //     ];

    //     console.log($data);
    //     return response()->json($data);

        
    // }
}
