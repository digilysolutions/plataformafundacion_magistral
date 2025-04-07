<?php

namespace Database\Seeders;

use App\Models\District;
use Illuminate\Database\Seeder;

class DistrictsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        $districts = [
            // Distritos de BARAHONA
            [
                'name' => 'PEDERNALES',
                'activated' => true,
                'code' => '0101',
                'regional_id' => 'BA0001',
            ],
            [
                'name' => 'ENRIQUILLO',
                'activated' => true,
                'code' => '0102',
                'regional_id' => 'BA0001',
            ],
            [
                'name' => 'BARAHONA',
                'activated' => true,
                'code' => '0103',
                'regional_id' => 'BA0001',
            ],
            [
                'name' => 'CABRAL',
                'activated' => true,
                'code' => '0104',
                'regional_id' => 'BA0001',
            ],
            [
                'name' => 'VICENTE NOBLE',
                'activated' => true,
                'code' => '0105',
                'regional_id' => 'BA0001',
            ],
        
            // Distritos de SAN JUAN DE LA MAGUANA
            [
                'name' => 'COMENDADOR',
                'activated' => true,
                'code' => '0201',
                'regional_id' => 'SA0001',
            ],
            [
                'name' => 'PEDRO SANTANA',
                'activated' => true,
                'code' => '0202',
                'regional_id' => 'SA0001',
            ],
            [
                'name' => 'LAS MATAS DE FARFAN',
                'activated' => true,
                'code' => '0203',
                'regional_id' => 'SA0001',
            ],
            [
                'name' => 'EL CERCADO',
                'activated' => true,
                'code' => '0204',
                'regional_id' => 'SA0001',
            ],
            [
                'name' => 'SAN JUAN ESTE',
                'activated' => true,
                'code' => '0205',
                'regional_id' => 'SA0001',
            ],
            [
                'name' => 'SAN JUAN OESTE',
                'activated' => true,
                'code' => '0206',
                'regional_id' => 'SA0001',
            ],
            [
                'name' => 'HONDO VALLE',
                'activated' => true,
                'code' => '0207',
                'regional_id' => 'SA0001',
            ],
        
            // Distritos de AZUA
            [
                'name' => 'AZUA',
                'activated' => true,
                'code' => '0301',
                'regional_id' => 'AZ0001',
            ],
            [
                'name' => 'PADRE DE LAS CASAS',
                'activated' => true,
                'code' => '0302',
                'regional_id' => 'AZ0001',
            ],
            [
                'name' => 'SAN JOSE DE OCOA',
                'activated' => true,
                'code' => '0303',
                'regional_id' => 'AZ0001',
            ],
            [
                'name' => 'BANI',
                'activated' => true,
                'code' => '0304',
                'regional_id' => 'AZ0001',
            ],
            [
                'name' => 'NIZAO',
                'activated' => true,
                'code' => '0305',
                'regional_id' => 'AZ0001',
            ],
        
            // Distritos de SAN CRISTOBAL
            [
                'name' => 'CAMBITA GARABITOS',
                'activated' => true,
                'code' => '0401',
                'regional_id' => 'SA0002',
            ],
            [
                'name' => 'SAN CRISTOBAL NORTE',
                'activated' => true,
                'code' => '0402',
                'regional_id' => 'SA0002',
            ],
            [
                'name' => 'SAN CRISTOBAL SUR',
                'activated' => true,
                'code' => '0403',
                'regional_id' => 'SA0002',
            ],
            [
                'name' => 'VILLA ALTAGRACIA',
                'activated' => true,
                'code' => '0404',
                'regional_id' => 'SA0002',
            ],
            [
                'name' => 'YAGUATE',
                'activated' => true,
                'code' => '0405',
                'regional_id' => 'SA0002',
            ],
            [
                'name' => 'HAINAA',
                'activated' => true,
                'code' => '0406',
                'regional_id' => 'SA0002',
            ],
            [
                'name' => 'SAN GREGORIO DE NIGUA',
                'activated' => true,
                'code' => '0407',
                'regional_id' => 'SA0002',
            ],
        
            // Distritos de SAN PEDRO DE MACORIS
            [
                'name' => 'SAN PEDRO DE MACORIS ESTE',
                'activated' => true,
                'code' => '0501',
                'regional_id' => 'SA0003',
            ],
            [
                'name' => 'SAN PEDRO DE MACORIS OESTE',
                'activated' => true,
                'code' => '0502',
                'regional_id' => 'SA0003',
            ],
            [
                'name' => 'LA ROMANA',
                'activated' => true,
                'code' => '0503',
                'regional_id' => 'SA0003',
            ],
            [
                'name' => 'HATO MAYOR',
                'activated' => true,
                'code' => '0504',
                'regional_id' => 'SA0003',
            ],
            [
                'name' => 'SABANA DE LA MAR',
                'activated' => true,
                'code' => '0505',
                'regional_id' => 'SA0003',
            ],
            [
                'name' => 'CONSUELO',
                'activated' => true,
                'code' => '0506',
                'regional_id' => 'SA0003',
            ],
            [
                'name' => 'SAN JOSE DE LOS LLANOS',
                'activated' => true,
                'code' => '0507',
                'regional_id' => 'SA0003',
            ],
            [
                'name' => 'QUISQUEYA',
                'activated' => true,
                'code' => '0508',
                'regional_id' => 'SA0003',
            ],
            [
                'name' => 'EL VALLE',
                'activated' => true,
                'code' => '0509',
                'regional_id' => 'SA0003',
            ],
            [
                'name' => 'GUAYMATE',
                'activated' => true,
                'code' => '0510',
                'regional_id' => 'SA0003',
            ],
            [
                'name' => 'VILLA HERMOSA',
                'activated' => true,
                'code' => '0511',
                'regional_id' => 'SA0003',
            ],
        
            // Distritos de LA VEGA
            [
                'name' => 'JOSE CONTRERAS',
                'activated' => true,
                'code' => '0601',
                'regional_id' => 'LA0001',
            ],
            [
                'name' => 'CONSTANZA',
                'activated' => true,
                'code' => '0602',
                'regional_id' => 'LA0001',
            ],
            [
                'name' => 'JARABACOA',
                'activated' => true,
                'code' => '0603',
                'regional_id' => 'LA0001',
            ],
            [
                'name' => 'LA VEGA OESTE',
                'activated' => true,
                'code' => '0604',
                'regional_id' => 'LA0001',
            ],
            [
                'name' => 'LA VEGA ESTE',
                'activated' => true,
                'code' => '0605',
                'regional_id' => 'LA0001',
            ],
            [
                'name' => 'MOCA',
                'activated' => true,
                'code' => '0606',
                'regional_id' => 'LA0001',
            ],
            [
                'name' => 'GASPAR HERNANDEZ',
                'activated' => true,
                'code' => '0607',
                'regional_id' => 'LA0001',
            ],
            [
                'name' => 'JAMAO AL NORTE',
                'activated' => true,
                'code' => '0608',
                'regional_id' => 'LA0001',
            ],
            [
                'name' => 'SAN VICTOR',
                'activated' => true,
                'code' => '0609',
                'regional_id' => 'LA0001',
            ],
            [
                'name' => 'JIMA ABAJO',
                'activated' => true,
                'code' => '0610',
                'regional_id' => 'LA0001',
            ],
        
            // Distritos de SAN FRANCISCO DE MACORIS
            [
                'name' => 'TENARES',
                'activated' => true,
                'code' => '0701',
                'regional_id' => 'SA0004',
            ],
            [
                'name' => 'SALCEDO',
                'activated' => true,
                'code' => '0702',
                'regional_id' => 'SA0004',
            ],
            [
                'name' => 'CASTILLO',
                'activated' => true,
                'code' => '0703',
                'regional_id' => 'SA0004',
            ],
            [
                'name' => 'VILLA RIVA',
                'activated' => true,
                'code' => '0704',
                'regional_id' => 'SA0004',
            ],
            [
                'name' => 'SAN FRANCISCO DE MACORIS SUR-E',
                'activated' => true,
                'code' => '0705',
                'regional_id' => 'SA0004',
            ],
            [
                'name' => 'SAN FRANCISCO DE MACORIS NOR-O',
                'activated' => true,
                'code' => '0706',
                'regional_id' => 'SA0004',
            ],
            [
                'name' => 'VILLA TAPIA',
                'activated' => true,
                'code' => '0707',
                'regional_id' => 'SA0004',
            ],
        
            // Distritos de SANTIAGO
            [
                'name' => 'SAN JOSE DE LAS MATAS',
                'activated' => true,
                'code' => '0801',
                'regional_id' => 'SA0005',
            ],
            [
                'name' => 'JANICO',
                'activated' => true,
                'code' => '0802',
                'regional_id' => 'SA0005',
            ],
            [
                'name' => 'SANTIAGO SUR-ESTE',
                'activated' => true,
                'code' => '0803',
                'regional_id' => 'SA0005',
            ],
            [
                'name' => 'SANTIAGO NOROESTE',
                'activated' => true,
                'code' => '0804',
                'regional_id' => 'SA0005',
            ],
            [
                'name' => 'SANTIAGO CENTRO-OESTE',
                'activated' => true,
                'code' => '0805',
                'regional_id' => 'SA0005',
            ],
            [
                'name' => 'SANTIAGO NORESTE',
                'activated' => true,
                'code' => '0806',
                'regional_id' => 'SA0005',
            ],
            [
                'name' => 'VILLA BISONO (NAVARRETE)',
                'activated' => true,
                'code' => '0807',
                'regional_id' => 'SA0005',
            ],
            [
                'name' => 'LICEY AL MEDIO',
                'activated' => true,
                'code' => '0808',
                'regional_id' => 'SA0005',
            ],
            [
                'name' => 'TAMBORIL',
                'activated' => true,
                'code' => '0809',
                'regional_id' => 'SA0005',
            ],
            [
                'name' => 'VILLA GONZALEZ',
                'activated' => true,
                'code' => '0810',
                'regional_id' => 'SA0005',
            ],
        
            // Distritos de MAO
            [
                'name' => 'MAO',
                'activated' => true,
                'code' => '0901',
                'regional_id' => 'MA0001',
            ],
            [
                'name' => 'ESPERANZA',
                'activated' => true,
                'code' => '0902',
                'regional_id' => 'MA0001',
            ],
            [
                'name' => 'SAN IGNACIO DE SABANETA',
                'activated' => true,
                'code' => '0903',
                'regional_id' => 'MA0001',
            ],
            [
                'name' => 'MONCION',
                'activated' => true,
                'code' => '0904',
                'regional_id' => 'MA0001',
            ],
            [
                'name' => 'LAGUNA SALADA',
                'activated' => true,
                'code' => '0905',
                'regional_id' => 'MA0001',
            ],
            [
                'name' => 'VILLA LOS ALMACIGOS',
                'activated' => true,
                'code' => '0906',
                'regional_id' => 'MA0001',
            ],
        
            // Distritos de SANTO DOMINGO
            [
                'name' => 'VILLA MELLA',
                'activated' => true,
                'code' => '1001',
                'regional_id' => 'SA0006',
            ],
            [
                'name' => 'SABANA PERDIDA',
                'activated' => true,
                'code' => '1002',
                'regional_id' => 'SA0006',
            ],
            [
                'name' => 'SANTO DOMINGO NORESTE',
                'activated' => true,
                'code' => '1003',
                'regional_id' => 'SA0006',
            ],
            [
                'name' => 'SANTO DOMINGO ORIENTAL',
                'activated' => true,
                'code' => '1004',
                'regional_id' => 'SA0006',
            ],
            [
                'name' => 'BOCA CHICA',
                'activated' => true,
                'code' => '1005',
                'regional_id' => 'SA0006',
            ],
            [
                'name' => 'MENDOZA',
                'activated' => true,
                'code' => '1006',
                'regional_id' => 'SA0006',
            ],
            [
                'name' => 'SAN ANTONIO DE GUERRA',
                'activated' => true,
                'code' => '1007',
                'regional_id' => 'SA0006',
            ],
        
            // Distritos de PUERTO PLATA
            [
                'name' => 'SOSUA',
                'activated' => true,
                'code' => '1101',
                'regional_id' => 'PU0001',
            ],
            [
                'name' => 'PUERTO PLATA',
                'activated' => true,
                'code' => '1102',
                'regional_id' => 'PU0001',
            ],
            [
                'name' => 'IMBERT',
                'activated' => true,
                'code' => '1103',
                'regional_id' => 'PU0001',
            ],
            [
                'name' => 'LUPERON',
                'activated' => true,
                'code' => '1104',
                'regional_id' => 'PU0001',
            ],
            [
                'name' => 'ALTAMIRA',
                'activated' => true,
                'code' => '1105',
                'regional_id' => 'PU0001',
            ],
            [
                'name' => 'EL MAMEY',
                'activated' => true,
                'code' => '1106',
                'regional_id' => 'PU0001',
            ],
            [
                'name' => 'VILLA ISABELA',
                'activated' => true,
                'code' => '1107',
                'regional_id' => 'PU0001',
            ],
        
            // Distritos de HIGUEY
            [
                'name' => 'HIGUEY',
                'activated' => true,
                'code' => '1201',
                'regional_id' => 'HI0001',
            ],
            [
                'name' => 'SAN RAFAEL DEL YUMA',
                'activated' => true,
                'code' => '1202',
                'regional_id' => 'HI0001',
            ],
            [
                'name' => 'EL SEIBO',
                'activated' => true,
                'code' => '1203',
                'regional_id' => 'HI0001',
            ],
            [
                'name' => 'MICHES',
                'activated' => true,
                'code' => '1204',
                'regional_id' => 'HI0001',
            ],
        
            // Distritos de MONTE CRISTI
            [
                'name' => 'MONTE CRISTI',
                'activated' => true,
                'code' => '1301',
                'regional_id' => 'MO0001',
            ],
            [
                'name' => 'GUAYUBIN',
                'activated' => true,
                'code' => '1302',
                'regional_id' => 'MO0001',
            ],
            [
                'name' => 'VILLA VASQUEZ',
                'activated' => true,
                'code' => '1303',
                'regional_id' => 'MO0001',
            ],
            [
                'name' => 'DAJABON',
                'activated' => true,
                'code' => '1304',
                'regional_id' => 'MO0001',
            ],
            [
                'name' => 'LOMA DE CABRERA',
                'activated' => true,
                'code' => '1305',
                'regional_id' => 'MO0001',
            ],
            [
                'name' => 'RESTAURACION',
                'activated' => true,
                'code' => '1306',
                'regional_id' => 'MO0001',
            ],
        
            // Distritos de NAGUA
            [
                'name' => 'NAGUA',
                'activated' => true,
                'code' => '1401',
                'regional_id' => 'NA0001',
            ],
            [
                'name' => 'CABRERA',
                'activated' => true,
                'code' => '1402',
                'regional_id' => 'NA0001',
            ],
            [
                'name' => 'RIO SAN JUAN',
                'activated' => true,
                'code' => '1403',
                'regional_id' => 'NA0001',
            ],
            [
                'name' => 'SAMANA',
                'activated' => true,
                'code' => '1404',
                'regional_id' => 'NA0001',
            ],
            [
                'name' => 'SANCHEZ',
                'activated' => true,
                'code' => '1405',
                'regional_id' => 'NA0001',
            ],
            [
                'name' => 'EL FACTOR',
                'activated' => true,
                'code' => '1406',
                'regional_id' => 'NA0001',
            ],
            [
                'name' => 'LAS TERRENAS',
                'activated' => true,
                'code' => '1407',
                'regional_id' => 'NA0001',
            ],
        
            // Distritos de SANTO DOMINGO
            [
                'name' => 'LOS ALCARRIZOS',
                'activated' => true,
                'code' => '1501',
                'regional_id' => 'SA0007',
            ],
            [
                'name' => 'SANTO DOMINGO CENTRO',
                'activated' => true,
                'code' => '1502',
                'regional_id' => 'SA0007',
            ],
            [
                'name' => 'SANTO DOMINGO SURCENTRAL',
                'activated' => true,
                'code' => '1503',
                'regional_id' => 'SA0007',
            ],
            [
                'name' => 'SANTO DOMINGO NOROESTE',
                'activated' => true,
                'code' => '1504',
                'regional_id' => 'SA0007',
            ],
            [
                'name' => 'HERRERA',
                'activated' => true,
                'code' => '1505',
                'regional_id' => 'SA0007',
            ],
            [
                'name' => 'PEDRO BRAND',
                'activated' => true,
                'code' => '1506',
                'regional_id' => 'SA0007',
            ],
        
            // Distritos de COTUI
            [
                'name' => 'COTUI',
                'activated' => true,
                'code' => '1601',
                'regional_id' => 'CO0001',
            ],
            [
                'name' => 'FANTINO',
                'activated' => true,
                'code' => '1602',
                'regional_id' => 'CO0001',
            ],
            [
                'name' => 'CEVICOS',
                'activated' => true,
                'code' => '1603',
                'regional_id' => 'CO0001',
            ],
            [
                'name' => 'BONAO SUROESTE',
                'activated' => true,
                'code' => '1604',
                'regional_id' => 'CO0001',
            ],
            [
                'name' => 'PIEDRA BLANCA',
                'activated' => true,
                'code' => '1605',
                'regional_id' => 'CO0001',
            ],
            [
                'name' => 'BONAO NORDESTE',
                'activated' => true,
                'code' => '1606',
                'regional_id' => 'CO0001',
            ],
            [
                'name' => 'VILLA LA MATA',
                'activated' => true,
                'code' => '1607',
                'regional_id' => 'CO0001',
            ],
        
            // Distritos de MONTE PLATA
            [
                'name' => 'YAMASA',
                'activated' => true,
                'code' => '1701',
                'regional_id' => 'MO0002',
            ],
            [
                'name' => 'MONTE PLATA',
                'activated' => true,
                'code' => '1702',
                'regional_id' => 'MO0002',
            ],
            [
                'name' => 'BAYAGUANA',
                'activated' => true,
                'code' => '1703',
                'regional_id' => 'MO0002',
            ],
            [
                'name' => 'SABANA GRANDE DE BOYA',
                'activated' => true,
                'code' => '1704',
                'regional_id' => 'MO0002',
            ],
            [
                'name' => 'PERALVILLO',
                'activated' => true,
                'code' => '1705',
                'regional_id' => 'MO0002',
            ],
            
            // Distritos de BAORUCO
            [
                'name' => 'NEIBA',
                'activated' => true,
                'code' => '1801',
                'regional_id' => 'BA0002',
            ],
            [
                'name' => 'TAMAYO',
                'activated' => true,
                'code' => '1802',
                'regional_id' => 'BA0002',
            ],
            [
                'name' => 'VILLA JARAGUA',
                'activated' => true,
                'code' => '1803',
                'regional_id' => 'BA0002',
            ],
            [
                'name' => 'JIMANI',
                'activated' => true,
                'code' => '1804',
                'regional_id' => 'BA0002',
            ],
            [
                'name' => 'DUVERGE',
                'activated' => true,
                'code' => '1805',
                'regional_id' => 'BA0002',
            ],
        ];
        foreach ($districts as $district) {
            District::create($district);
        }

    }
}
