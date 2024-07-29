<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use PhpOffice\PhpSpreadsheet\IOFactory;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use DateTime;

class BoletosController extends Controller
{
    private function verifyRate($juros, $vlr, $dtVct)
    {
        $hoje   = new DateTime();
        $data   = DateTime::createFromFormat('d/m/y', $dtVct);

        if( $data >= $hoje )
        {
            return 0;
        }
        elseif( $data < $hoje )
        {
            $tx     = str_replace("%", "", $juros);
            $tx     = str_replace(",", ".", $tx);
            $valor  = str_replace("R$", "", $vlr);
            $valor  = str_replace(",", ".", $valor);

            return ($valor/100) * $tx;
        }
    }

    private function verifyDate($date)
    {
        $hoje   = new DateTime();
        $data   = DateTime::createFromFormat('d/m/y', $date);
        $status = '';

        if( $data < $hoje )
        {
            $status = ['vencida', 'red'];
        }
        elseif( $data >= $hoje )
        {
            $status = ['aberto', 'green'];
        }
        else
        {
            $status = ['invalido', 'grey'];
        }

        return $status;

    }

    private function higienyArray($array, $request)
    {
        $newArray = [];

        if(count($array) == 0 && isset($array) )
        {
            return $newArray;
        }

        foreach($array as $k=>$row)
        {
            if($k>0)
            {
                $arr                = [];
                $arr['name']        = $row[0];
                $arr['email']       = $row[1];
                $arr['cnpj']        = $row[2];
                $arr['codBarras']   = str_replace([' ', '.'], '',$row[3]);
                $arr['valor']       = str_replace(['R$'], '', $row[4]);
                $arr['vencimento']  = $row[5];
                $arr['juros']       = $this->verifyRate($row[6], (int)$row[4], $row[5]);
                $arr['status']      = $this->verifyDate($row[5]);
                $newArray[]         = $arr;
            }
        }

        return $newArray;
    }

    public function index(Request $request)
    {
        $request->validate([
            'inputFile' => 'required|mimes:xlsx'
        ]);

        $file           = $request->file('inputFile');
        $spreadsheet    = IOFactory::load($file);
        $planilha       = $spreadsheet->getActiveSheet();
        $rows           = $planilha->toArray();
        $newArray       = $this->higienyArray($rows, $request);

        return redirect('/')->with('rows',$newArray);
    }
}
