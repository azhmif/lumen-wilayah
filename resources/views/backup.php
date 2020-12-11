<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="utf-8">
    <title>Rekap Penduduk</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .header,
        .footer {
            width: 100%;
            text-align: center;
            position: fixed;
        }

        .header {
            top: 0px;
        }

        .footer {
            bottom: 0px;
        }

        .pagenum:before {
            content: counter(page);
        }
        tr.border_bottom td {
  border-bottom:1pt solid black;
}
        
        

    </style>
</head>

<body>
    <div class="footer">
        Page <span class="pagenum"></span>
    </div>
    <center>
        <h2>DESA SUNGAI PETAI</h2>
        <h3>Rekap Penduduk RT/RW {{$datart->nama.'/'.$datart->dataRw->nama.' '.$datart->dataRw->dataDusun->nama}}</h3>
    </center>
    <table witdh="100%"  page-break-inside: true;>
        <thead>
            <tr  class="border_bottom">
                <th style="text-align: center">Data penduduk</th>
            </tr>
        </thead>
        <tbody>
            @foreach($kk as $key =>$dt)
            <tr  class="border_bottom">
                <?php 
                    $cek  = \App\Penduduk::where('id_kk',$dt->id_kk)->count();
                        $cekKepala  = \App\Penduduk::join('shdk','shdk.uuid','penduduk.shdk')->where('id_kk',$dt->id_kk)->where('shdk.nama','Kepala Keluarga')->count();
                    ?>
                @if($dt->nama_shdk=="Kepala Keluarga" && $cekKepala==1)
                <td style="padding-left: 1px,font-weight:bold">
                   <b>{{ $dt->nama_penduduk.'('.$dt->nama_shdk.')' }}</b>
                </td>
                @else
                @if($cekKepala>1)
                <td style="padding-left: 1px,font-weight:bold">
                    <b> Duplikasi kepala keluarga</b>
                </td>
                    @endif
                @if($cekKepala==1)
                    @endif
                <td style="padding-left: 45px">
                    
                    {{$dt->nama_penduduk.'('.$dt->nama_shdk.')'}}
                </td>
                @endif
            </tr>
            @endforeach
        </tbody>
    </table>
    </div>
</body>

</html>
