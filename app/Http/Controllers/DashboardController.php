<?php

namespace App\Http\Controllers;

use App\Models\Dtr;
use App\Models\OldDtr;
use App\Models\OldUser;
use App\Models\User;
use App\Models\UserRole;
use App\Models\UserInformation;
use App\Models\Employee;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Services\DropdownClass;

class DashboardController extends Controller
{
    public function __construct(
            DropdownClass $dropdown,

        ){
        $this->dropdown = $dropdown;
    }

    public function index(Request $request){
        
//         $assets = [
//     [
//         "code"=> "DOST9-EQ-001",
//         "type"=> "Vehicle",
//         "name"=> "HILUX - MT",
//         "brand"=> "TOYOTA",
//         "model"=> "HILUX (G)",
//         "serial_no"=> "",
//         "date_acquired"=> "12-29-18",
//         "value"=> "P 1,419,769.00",
//         "information"=> []
//     ],
//     [
//         "code"=> "DOST9-EQ-002",
//         "type"=> "Vehicle",
//         "name"=> "HILUX - AT",
//         "brand"=> "TOYOTA",
//         "model"=> "HILUX (G)",
//         "serial_no"=> "",
//         "date_acquired"=> "08-26-21",
//         "value"=> "P 1,499,500.00",
//         "information"=> []
//     ],
//     [
//         "code"=> "DOST9-EQ-003",
//         "type"=> "Vehicle",
//         "name"=> "STRADA - GL",
//         "brand"=> "MITSUBISHI",
//         "model"=> "STRADA GL",
//         "serial_no"=> "",
//         "date_acquired"=> "04-08-08",
//         "value"=> "P 850,000.00",
//         "information"=> []
//     ],
//     [
//         "code"=> "DOST9-EQ-006",
//         "type"=> "AIR CONDITIONER",
//         "name"=> "Technical",
//         "brand"=> "PANASONIC",
//         "model"=> "CW XC 244 EPH",
//         "serial_no"=> "",
//         "date_acquired"=> "05-25-10",
//         "value"=> "P 27,999.00",
//         "information"=> [
//             "S.N.=>\t\t9D0702930"
//         ]
//     ],
//     [
//         "code"=> "DOST9-EQ-009",
//         "type"=> "AIR CONDITIONER",
//         "name"=> "Supply Stock Room",
//         "brand"=> "KOPPEL",
//         "model"=> "KWR-09R4A2",
//         "serial_no"=> "",
//         "date_acquired"=> "11-16-23",
//         "value"=> "P 19,095.00",
//         "information"=> [
//             "S.N.=>\t\t221003-01689"
//         ]
//     ],
//     [
//         "code"=> "DOST9-EQ-010",
//         "type"=> "Split Type - Air Conditioner",
//         "name"=> "Metro Lab",
//         "brand"=> "KOPPEL",
//         "model"=> "KV18WM-ARF21B",
//         "serial_no"=> "",
//         "date_acquired"=> "04-14-16",
//         "value"=> "P 48,295.00",
//         "information"=> [
//             "S.N.=>\t\tMH581865"
//         ]
//     ],
//     [
//         "code"=> "DOST9-EQ-011",
//         "type"=> "AIR CONDITIONER",
//         "name"=> "COA Auditor",
//         "brand"=> "PANASONIC",
//         "model"=> "CW- SC105 VPH",
//         "serial_no"=> "",
//         "date_acquired"=> "04-26-18",
//         "value"=> "P 18,699.00",
//         "information"=> [
//             "S.N.=>\t\t7N2222410"
//         ]
//     ],
//     [
//         "code"=> "DOST9-EQ-012",
//         "type"=> "AIR CONDITIONER",
//         "name"=> "Chemical Stock Room",
//         "brand"=> "PANASONIC",
//         "model"=> "CW-XC244EPH",
//         "serial_no"=> "",
//         "date_acquired"=> "08-01-2011",
//         "value"=> "P 27,999.00",
//         "information"=> [
//             "S.N.=>\t\t120204691"
//         ]
//     ],
//     [
//         "code"=> "DOST9-EQ-014",
//         "type"=> "AIR CONDITIONER",
//         "name"=> "RSTL Office",
//         "brand"=> "PANASONIC",
//         "model"=> "CW SC 245 EPH",
//         "serial_no"=> "",
//         "date_acquired"=> "05-29-19",
//         "value"=> "P 33,350.00",
//         "information"=> [
//             "S.N.=>\t\t931823148"
//         ]
//     ],
//     [
//         "code"=> "DOST9-EQ-015",
//         "type"=> "AIR CONDITIONER",
//         "name"=> "Micro Lab1",
//         "brand"=> "PANASONIC",
//         "model"=> "CW-SC245EPH",
//         "serial_no"=> "",
//         "date_acquired"=> "10-05-16",
//         "value"=> "P 25,399.00",
//         "information"=> [
//             "S.N.=>\t\t690609971"
//         ]
//     ],
//     [
//         "code"=> "DOST9-EQ-016",
//         "type"=> "AIR CONDITIONER",
//         "name"=> "Instrument Room\nChem Lab",
//         "brand"=> "EVEREST",
//         "model"=> "ETM20WD-HF",
//         "serial_no"=> "",
//         "date_acquired"=> "03-30-16",
//         "value"=> "P 21,695.00",
//         "information"=> [
//             "S.N.=>\t\t92400575810250010130032"
//         ]
//     ],
//     [
//         "code"=> "DOST9-EQ-017",
//         "type"=> "AIR CONDITIONER",
//         "name"=> "Wet Room\nChem Lab",
//         "brand"=> "KOLIN",
//         "model"=> "KAG-250WCINV",
//         "serial_no"=> "",
//         "date_acquired"=> "09-26-23",
//         "value"=> "P 43,535.00",
//         "information"=> [
//             "S.N.=>\t\t19142303-15770"
//         ]
//     ],
//     [
//         "code"=> "DOST9-EQ-018",
//         "type"=> "AIR CONDITIONER",
//         "name"=> "Metro Lab",
//         "brand"=> "PANASONIC",
//         "model"=> "CW-SC245EPH",
//         "serial_no"=> "",
//         "date_acquired"=> "12-19-18",
//         "value"=> "P 31,799.00",
//         "information"=> [
//             "S.N.=>\t\t8N1221545"
//         ]
//     ],
//     [
//         "code"=> "DOST9-EQ-020",
//         "type"=> "AIR CONDITIONER",
//         "name"=> "Food Lab",
//         "brand"=> "PANASONIC",
//         "model"=> "CW- SC245 EPH",
//         "serial_no"=> "",
//         "date_acquired"=> "04-18-18",
//         "value"=> "P 30,380.00",
//         "information"=> [
//             "S.N.=>\t\t812517754"
//         ]
//     ],
//     [
//         "code"=> "DOST9-EQ-031",
//         "type"=> "ALL-IN-ONE COMPUTER",
//         "name"=> "FASS BUDG1",
//         "brand"=> "",
//         "model"=> "",
//         "serial_no"=> "DQBFSSP00B150014193000",
//         "date_acquired"=> "08/06/2021",
//         "value"=> "P 46,299.00",
//         "information"=> [
//             "ACER C24-1650 All-in-One PC",
//             "11th-Gen Intel i5-1135G7 @2.40GHz",
//             "8 GB DDR4-2133 RAM",
//             "238.47 SSD + 1TB HDD",
//             "Windows 11 Pro 64-bit"
//         ]
//     ],
//     [
//         "code"=> "DOST9-EQ-032",
//         "type"=> "ALL-IN-ONE COMPUTER",
//         "name"=> "FASS ACCT1",
//         "brand"=> "",
//         "model"=> "",
//         "serial_no"=> "DQBFSSP00B150013C73000",
//         "date_acquired"=> "08/06/2021",
//         "value"=> "P 46,299.00",
//         "information"=> [
//             "ACER C24-1650 All-in-One PC",
//             "11th-Gen Intel i5-1135G7 @2.40GHz",
//             "8 GB DDR4-2133 RAM",
//             "238.47 SSD + 1TB HDD",
//             "Windows 11 Pro 64-bit"
//         ]
//     ],
//     [
//         "code"=> "DOST9-EQ-033",
//         "type"=> "ALL-IN-ONE COMPUTER",
//         "name"=> "FASS PURC1",
//         "brand"=> "",
//         "model"=> "",
//         "serial_no"=> "DQBFSSP00B150014373000",
//         "date_acquired"=> "08/06/2021",
//         "value"=> "P 46,299.00",
//         "information"=> [
//             "ACER C24-1650 All-in-One PC",
//             "11th-Gen Intel i5-1135G7 @2.40GHz",
//             "8 GB DDR4-2133 RAM",
//             "238.47 SSD + 1TB HDD",
//             "Windows 11 Pro 64-bit"
//         ]
//     ],
//     [
//         "code"=> "DOST9-EQ-034",
//         "type"=> "ALL-IN-ONE COMPUTER",
//         "name"=> "FASS CASH1",
//         "brand"=> "",
//         "model"=> "",
//         "serial_no"=> "DQBFSSP00B1500142C3000",
//         "date_acquired"=> "08/06/2021",
//         "value"=> "P 46,299.00",
//         "information"=> [
//             "ACER C24-1650 All-in-One PC",
//             "11th-Gen Intel i5-1135G7 @2.40GHz",
//             "8 GB DDR4-2133 RAM",
//             "238.47 SSD + 1TB HDD",
//             "Windows 11 Pro 64-bit"
//         ]
//     ],
//     [
//         "code"=> "DOST9-EQ-035",
//         "type"=> "Desktop Computer",
//         "name"=> "COA AUDITOR1",
//         "brand"=> "",
//         "model"=> "",
//         "serial_no"=> "",
//         "date_acquired"=> "03-15-18",
//         "value"=> "",
//         "information"=> [
//             "INTEL CORE i3-2120; 3.3 GHz",
//             "4GB DDR3 RAM",
//             "500 GB HDD",
//             "Windows 10 Home 64-bit",
//             "Philips 221EL LED Monitor",
//             "s/n=> AU2A1108000177"
//         ]
//     ],
//     [
//         "code"=> "DOST9-EQ-036",
//         "type"=> "ALL-IN-ONE COMPUTER",
//         "name"=> "RSTL AIOPC3 METRO1",
//         "brand"=> "",
//         "model"=> "",
//         "serial_no"=> "",
//         "date_acquired"=> "21/09/2021",
//         "value"=> "P 45,000.00",
//         "information"=> [
//             "ACER C24-960 All-in-One PC",
//             "Intel i3-10110 @ 2.10GHz",
//             "4 GB RAM",
//             "238.47 GB SSD / 1TB WDC HDD",
//             "Windows 10 Home SL",
//             "S/N=> DQBD6SP0030280023E3000"
//         ]
//     ],
//     [
//         "code"=> "DOST9-EQ-037",
//         "type"=> "ALL-IN-ONE COMPUTER",
//         "name"=> "FASS ARD",
//         "brand"=> "",
//         "model"=> "",
//         "serial_no"=> "DQBFSSP00512701F063000",
//         "date_acquired"=> "08/06/2021",
//         "value"=> "P 46,299.00",
//         "information"=> [
//             "ACER C24-1650 All-in-One PC",
//             "11th-Gen Intel i5-1135G7 @2.40GHz",
//             "8 GB DDR4-2133 RAM",
//             "238.47 SSD + 1TB HDD",
//             "Windows 10 Pro 64-bit"
//         ]
//     ],
//     [
//         "code"=> "DOST9-EQ-038",
//         "type"=> "ALL-IN-ONE COMPUTER",
//         "name"=> "RSTL AIOPC2 MICRO1",
//         "brand"=> "",
//         "model"=> "",
//         "serial_no"=> "",
//         "date_acquired"=> "21/09/2021",
//         "value"=> "P 45,000.00",
//         "information"=> [
//             "ACER C24-960 All-in-One PC",
//             "Intel i3-10110 @ 2.10GHz",
//             "4 GB RAM",
//             "238.47 GB SSD / 1TB WDC HDD",
//             "Windows 10 Home SL",
//             "S/N=> DQBD6SP003028002463000"
//         ]
//     ],
//     [
//         "code"=> "DOST9-EQ-039",
//         "type"=> "ALL-IN-ONE COMPUTER",
//         "name"=> "RSTL AIOPC5 CHEM1",
//         "brand"=> "",
//         "model"=> "",
//         "serial_no"=> "",
//         "date_acquired"=> "21/09/2021",
//         "value"=> "P 45,000.00",
//         "information"=> [
//             "ACER C24-960 All-in-One PC",
//             "Intel i3-10110 @ 2.10GHz",
//             "4 GB RAM",
//             "238.47 GB SSD / 1TB WDC HDD",
//             "Windows 10 Home SL",
//             "S/N=> DQBD6SP0030280024D3000"
//         ]
//     ],
//     [
//         "code"=> "DOST9-EQ-040",
//         "type"=> "ALL-IN-ONE COMPUTER",
//         "name"=> "RSTL AIOPC6 CHEM2",
//         "brand"=> "",
//         "model"=> "",
//         "serial_no"=> "",
//         "date_acquired"=> "21/09/2021",
//         "value"=> "P 45,000.00",
//         "information"=> [
//             "ACER C24-960 All-in-One PC",
//             "Intel i3-10110 @ 2.10GHz",
//             "4 GB RAM",
//             "238.47 GB SSD / 1TB WDC HDD",
//             "Windows 10 Home SL",
//             "S/N=> DQBD6SP003028002653000"
//         ]
//     ],
//     [
//         "code"=> "DOST9-EQ-041",
//         "type"=> "SERVER COMPUTER",
//         "name"=> "HANDA",
//         "brand"=> "",
//         "model"=> "",
//         "serial_no"=> "",
//         "date_acquired"=> "06-02-2017",
//         "value"=> "P 46,330.00",
//         "information"=> [
//             "Intel Core i7-7700 3.60GHz",
//             "16 GB DDR4 RAM",
//             "2 TB HDD",
//             "NVidia GeForce GT720 2GB GFX",
//             "Windows 10 Pro 64-bit",
//             "AOC E2280SW 22in. LED Monitor"
//         ]
//     ],
//     [
//         "code"=> "DOST9-EQ-042",
//         "type"=> "SERVER COMPUTER",
//         "name"=> "ENGAS",
//         "brand"=> "",
//         "model"=> "",
//         "serial_no"=> "",
//         "date_acquired"=> "06-02-2017",
//         "value"=> "P 46,330.00",
//         "information"=> [
//             "Intel Core i7-7700 3.60GHz",
//             "16 GB DDR4 RAM",
//             "2 TB HDD",
//             "NVidia GeForce GT720 2GB GFX",
//             "Windows 10 Pro 64-bit",
//             "AOC E2280SW 22in. LED Monitor"
//         ]
//     ],
//     [
//         "code"=> "DOST9-EQ-043",
//         "type"=> "LAPTOP COMPUTER",
//         "name"=> "FASS ARD",
//         "brand"=> "",
//         "model"=> "",
//         "serial_no"=> "",
//         "date_acquired"=> "18/12/2020",
//         "value"=> "P 45,110.00",
//         "information"=> [
//             "DELL LATITUDE 7210 2-IN-1",
//             "Intel i5-102100 @ 1.60 GHz",
//             "8 GB RAM",
//             "500GB HDD",
//             "Windows 10 Pro",
//             "S/N=> 5X1Y473"
//         ]
//     ],
//     [
//         "code"=> "DOST9-EQ-044",
//         "type"=> "LAPTOP COMPUTER",
//         "name"=> "FASS CASH1",
//         "brand"=> "HP",
//         "model"=> "HP EliteBook x360 1030 G2",
//         "serial_no"=> "",
//         "date_acquired"=> "11-15-2019",
//         "value"=> "P",
//         "information"=> [
//             "S.N.=>\t\t5CG849068S"
//         ]
//     ],
//     [
//         "code"=> "DOST9-EQ-045",
//         "type"=> "SERVER COMPUTER",
//         "name"=> "PROXMOX",
//         "brand"=> "",
//         "model"=> "",
//         "serial_no"=> "",
//         "date_acquired"=> "06-02-2017",
//         "value"=> "P 46,330.00",
//         "information"=> [
//             "Intel Core i7-7700 3.60GHz",
//             "16 GB DDR4 RAM",
//             "2 TB HDD",
//             "NVidia GeForce GT720 2GB GFX",
//             "Debian GNU/Linux",
//             "AOC E2280SW 22in. LED Monitor"
//         ]
//     ],
//     [
//         "code"=> "DOST9-EQ-046",
//         "type"=> "SERVER COMPUTER",
//         "name"=> "EULIMS",
//         "brand"=> "",
//         "model"=> "",
//         "serial_no"=> "",
//         "date_acquired"=> "10-30-2014",
//         "value"=> "P 147,400.00",
//         "information"=> [
//             "DELL PowerEdge T320",
//             "Intel Xeon E5-2403 1.8GHz 4 Cores",
//             "32 GB DDR3 RAM",
//             "2 TB HDD / Ubuntu OS"
//         ]
//     ],
//     [
//         "code"=> "DOST9-EQ-047",
//         "type"=> "ALL-IN-ONE COMPUTER",
//         "name"=> "TS SCHO1",
//         "brand"=> "",
//         "model"=> "",
//         "serial_no"=> "DQBFSSP00B150014BE3000",
//         "date_acquired"=> "08/06/2021",
//         "value"=> "P 46,299.00",
//         "information"=> [
//             "ACER C24-1650 All-in-One PC",
//             "11th-Gen Intel i5-1135G7 @2.40GHz",
//             "8 GB DDR4-2133 RAM",
//             "238.47 SSD + 1TB HDD",
//             "Windows 11 Pro 64-bit"
//         ]
//     ],
//     [
//         "code"=> "DOST9-EQ-048",
//         "type"=> "ALL-IN-ONE COMPUTER",
//         "name"=> "FASS BUDG2",
//         "brand"=> "",
//         "model"=> "",
//         "serial_no"=> "DQBFSSP00B1500146F3000",
//         "date_acquired"=> "08/06/2021",
//         "value"=> "P 46,299.00",
//         "information"=> [
//             "ACER C24-1650 All-in-One PC",
//             "11th-Gen Intel i5-1135G7 @2.40GHz",
//             "8 GB RAM; 238.47 SSD + 1TB HDD",
//             "Windows 11 Pro 64-bit"
//         ]
//     ],
//     [
//         "code"=> "DOST9-EQ-049",
//         "type"=> "LAPTOP COMPUTER",
//         "name"=> "STSIMS1",
//         "brand"=> "",
//         "model"=> "",
//         "serial_no"=> "",
//         "date_acquired"=> "11/10/2021",
//         "value"=> "P 105,000.00",
//         "information"=> [
//             "ACER PREDATOR HELIOS 300 (PH315-54)",
//             "11th Gen Intel i7-11800H @ 2.30GHz",
//             "16 GB RAM; 512 GB NVMe SSD; GeForce RTX 3060 6GB VRAM; Windows 10 Pro",
//             "S/N=> NHQC2CN0031251AAF13400"
//         ]
//     ],
//     [
//         "code"=> "DOST9-EQ-050",
//         "type"=> "ALL-IN-ONE COMPUTER",
//         "name"=> "CSF Kiosk",
//         "brand"=> "",
//         "model"=> "",
//         "serial_no"=> "8CC7410K3L",
//         "date_acquired"=> "08-10-2018",
//         "value"=> "P 45,210.00",
//         "information"=> [
//             "HP Pavilion 24-B219D AiO PC (Touch)",
//             "Intel Corei3-7100T @ 3.4GHz",
//             "4GB DRAM; 1TB 7200 HDD"
//         ]
//     ],
//     [
//         "code"=> "DOST9-EQ-051",
//         "type"=> "ALL-IN-ONE COMPUTER",
//         "name"=> "TS SCHO4",
//         "brand"=> "",
//         "model"=> "",
//         "serial_no"=> "DQBJ3SP001237027543000",
//         "date_acquired"=> "09/11/2022",
//         "value"=> "P 49,995.00",
//         "information"=> [
//             "ACER C24-1750 All-in-One PC",
//             "12th-Gen Intel i5-1240G4 @ 3.0GHz",
//             "8 GB RAM; 238.47 SSD + 1TB HDD",
//             "Windows 10 Pro 64-bit"
//         ]
//     ],
//     [
//         "code"=> "DOST9-EQ-052",
//         "type"=> "ALL-IN-ONE COMPUTER",
//         "name"=> "ORD CSTC-ZCIC1",
//         "brand"=> "",
//         "model"=> "",
//         "serial_no"=> "",
//         "date_acquired"=> "09/11/2022",
//         "value"=> "P 46,299.00",
//         "information"=> [
//             "Acer C24-1750 AiO-PC",
//             "12th-Gen Intel i5-1240P @ 3.00GHz",
//             "8 GB; 238.47 GB SSD + 1TB HDD",
//             "Windows 11 Home SL",
//             "S/N=> DQBJ3SP001237027943000"
//         ]
//     ],
//     [
//         "code"=> "DOST9-EQ-053",
//         "type"=> "Desktop Computer",
//         "name"=> "FILESERVER",
//         "brand"=> "",
//         "model"=> "",
//         "serial_no"=> "",
//         "date_acquired"=> "06-19-2017",
//         "value"=> "P 146,778.00",
//         "information"=> [
//             "DELL PowerEdge T430",
//             "Intel Xeon E5-2620 2.10GHz 16 Cores; 8 GB DDR4 RAM; 6 TB HDD",
//             "Ubuntu Linux Operating System"
//         ]
//     ],
//     [
//         "code"=> "DOST9-EQ-054",
//         "type"=> "ALL-IN-ONE COMPUTER",
//         "name"=> "TS SCHO3",
//         "brand"=> "",
//         "model"=> "",
//         "serial_no"=> "",
//         "date_acquired"=> "26/05/2022",
//         "value"=> "P 46,299.00",
//         "information"=> [
//             "Acer C24-1650 AiO-PC",
//             "11th-G Intel i5-1135G7 @ 2.40GHz",
//             "8 GB RAM",
//             "238.47 GB SSD + 1TB WDC HDD",
//             "Windows 11 Home SL",
//             "S/N=> DQBFSSP00B150014293000"
//         ]
//     ],
//     [
//         "code"=> "DOST9-EQ-055",
//         "type"=> "ALL-IN-ONE COMPUTER",
//         "name"=> "FASS PURC2",
//         "brand"=> "",
//         "model"=> "",
//         "serial_no"=> "",
//         "date_acquired"=> "09/11/2022",
//         "value"=> "\u20b1 46,299.00",
//         "information"=> [
//             "HP ALL-IN-ONE PC 24-f0033d;",
//             "Intel i3-8130 @ 2.20GHz",
//             "4 GB; 1TB WDC HDD",
//             "Windows 10 Home SL",
//             "S/N=> 8CC83507Z2"
//         ]
//     ],
//     [
//         "code"=> "DOST9-EQ-056",
//         "type"=> "ALL-IN-ONE COMPUTER",
//         "name"=> "TS SCHO2",
//         "brand"=> "",
//         "model"=> "",
//         "serial_no"=> "DQBFSSP00B150014303000",
//         "date_acquired"=> "08/06/2021",
//         "value"=> "P 46,299.00",
//         "information"=> [
//             "ACER C24-1650 All-in-One PC",
//             "11th-Gen Intel i5-1135G7 @2.40GHz",
//             "8 GB RAM; 238.47 SSD + 1TB HDD",
//             "Windows 10 SL 64-bit"
//         ]
//     ],
//     [
//         "code"=> "DOST9-EQ-057",
//         "type"=> "Desktop Computer",
//         "name"=> "HRMIS KIOSK",
//         "brand"=> "",
//         "model"=> "",
//         "serial_no"=> "PC07YXCL",
//         "date_acquired"=> "12-03-15",
//         "value"=> "P 17,236.12",
//         "information"=> [
//             "LENOVO S500",
//             "INTEL G1840; 2.8 GHz",
//             "4 GB RAM; 500 GB HDD",
//             "Lenovo 15.5\u201d LED Monitor"
//         ]
//     ],
//     [
//         "code"=> "DOST9-EQ-058",
//         "type"=> "Desktop Computer",
//         "name"=> "SCIMS KIOSK",
//         "brand"=> "",
//         "model"=> "",
//         "serial_no"=> "PC07XXYP",
//         "date_acquired"=> "12-03-15",
//         "value"=> "P 17,236.12",
//         "information"=> [
//             "LENOVO S500",
//             "INTEL G1840; 2.8 GHz",
//             "4 GB RAM; 500 GB HDD",
//             "Lenovo 15.5 LED Monitor"
//         ]
//     ],
//     [
//         "code"=> "DOST9-EQ-059",
//         "type"=> "GENSET",
//         "name"=> "CUMMINS",
//         "brand"=> "CUMMINS",
//         "model"=> "4BT3.9G2",
//         "serial_no"=> "",
//         "date_acquired"=> "05-18-09",
//         "value"=> "P 588,000.00",
//         "information"=> []
//     ],
//     [
//         "code"=> "DOST9-EQ-060",
//         "type"=> "ALL-IN-ONE COMPUTER",
//         "name"=> "TS AIOPC4",
//         "brand"=> "",
//         "model"=> "",
//         "serial_no"=> "DQBJ3SP001237027513000",
//         "date_acquired"=> "09/11/2022",
//         "value"=> "P 46,299.00",
//         "information"=> [
//             "ACER C24-1750 All-in-One PC",
//             "12th-Gen Intel i5-1240P @ 3.00GHz",
//             "8 GB RAM",
//             "238.47 SSD + 1TB HDD",
//             "Windows 11 HOME SL 64-bit"
//         ]
//     ],
//     [
//         "code"=> "DOST9-EQ-061",
//         "type"=> "ALL-IN-ONE COMPUTER",
//         "name"=> "FASS ACCT2",
//         "brand"=> "",
//         "model"=> "",
//         "serial_no"=> "DQBFSSP00B150014A73000",
//         "date_acquired"=> "08/06/2021",
//         "value"=> "P 46,299.00",
//         "information"=> [
//             "ACER C24-1650 All-in-One PC",
//             "11th-Gen Intel i5-1135G7 @2.40GHz",
//             "8 GB RAM",
//             "238.47 SSD + 1TB HDD",
//             "Windows 10 SL 64-bit"
//         ]
//     ],
//     [
//         "code"=> "DOST9-EQ-062",
//         "type"=> "ALL-IN-ONE COMPUTER",
//         "name"=> "TS SVNG1",
//         "brand"=> "",
//         "model"=> "",
//         "serial_no"=> "DQBJ3SP0012370274C3000",
//         "date_acquired"=> "08/06/2021",
//         "value"=> "P 49,995.00",
//         "information"=> [
//             "Acer C24-1750 AiO-PC (MITHI 2022)",
//             "12th-Gen Intel i5-1240P @ 3.00GHz",
//             "8 GB RAM",
//             "238.47 SSD + 1TB HDD",
//             "Windows 11 SL 64-bit"
//         ]
//     ],
//     [
//         "code"=> "DOST9-EQ-063",
//         "type"=> "LAPTOP COMPUTER",
//         "name"=> "TS SVNG1",
//         "brand"=> "DELL",
//         "model"=> "DELL LATITUDE 7210 2-IN-1",
//         "serial_no"=> "",
//         "date_acquired"=> "12-15-2020",
//         "value"=> "P 57,000.00",
//         "information"=> [
//             "S.N.=>\t\t2FFY473"
//         ]
//     ],
//     [
//         "code"=> "DOST9-EQ-064",
//         "type"=> "ALL-IN-ONE COMPUTER",
//         "name"=> "TS DRRM1",
//         "brand"=> "",
//         "model"=> "",
//         "serial_no"=> "",
//         "date_acquired"=> "08/13/2021",
//         "value"=> "P 46,299.00",
//         "information"=> [
//             "Acer C24-1651 AiO-PC",
//             "11th-Gen Intel i3-1115G4 @3.00GHz",
//             "4 GB RAM;",
//             "238.47 GB SSD + 1TB WDC HDD;",
//             "Windows 10 Home SL",
//             "S/N=> DQBG0SP001111018A83000"
//         ]
//     ],
//     [
//         "code"=> "DOST9-EQ-065",
//         "type"=> "LAPTOP COMPUTER",
//         "name"=> "TS RXBOX1",
//         "brand"=> "",
//         "model"=> "",
//         "serial_no"=> "NXA0YSP0030500AE432N00",
//         "date_acquired"=> "24/08/2021",
//         "value"=> "P 59,999.00",
//         "information"=> [
//             "Acer Swift SF314-510G",
//             "11th-G Intel i7-1165G7 @ 2.80 GHz",
//             "16GB RAM;",
//             "1TB NVMe WDC SSD",
//             "Windows 10 Home SL"
//         ]
//     ],
//     [
//         "code"=> "DOST9-EQ-066",
//         "type"=> "Desktop Computer",
//         "name"=> "INFOBOARD",
//         "brand"=> "",
//         "model"=> "",
//         "serial_no"=> "PC07XX1P",
//         "date_acquired"=> "12-03-15",
//         "value"=> "P 17,236.12",
//         "information"=> [
//             "LENOVO S500",
//             "INTEL G1840; 2.8 GHz",
//             "4 GB RAM; 500 GB HDD"
//         ]
//     ],
//     [
//         "code"=> "DOST9-EQ-067",
//         "type"=> "Split Type - Air Conditioner",
//         "name"=> "2.0 HP",
//         "brand"=> "KOLIN",
//         "model"=> "KSG-20B1",
//         "serial_no"=> "",
//         "date_acquired"=> "12-01-09",
//         "value"=> "P 46,300.00",
//         "information"=> [
//             "S.N.=>\t\t10140907-172 17"
//         ]
//     ],
//     [
//         "code"=> "DOST9-EQ-068",
//         "type"=> "Split Type - Air Conditioner",
//         "name"=> "Ante Room Lab",
//         "brand"=> "KOLIN",
//         "model"=> "KSM-150 B1E",
//         "serial_no"=> "",
//         "date_acquired"=> "12-01-09",
//         "value"=> "P 36,580.00",
//         "information"=> [
//             "S.N.=>\t\t10570906-10019"
//         ]
//     ],
//     [
//         "code"=> "DOST9-EQ-069",
//         "type"=> "LCD PROJECTOR",
//         "name"=> "TS-SCHO",
//         "brand"=> "",
//         "model"=> "",
//         "serial_no"=> "",
//         "date_acquired"=> "01-23-2020",
//         "value"=> "\u20b1 93,020.00 (LOT with Computer)",
//         "information"=> [
//             "EPSON EB-1781W H794C",
//             "RGB liquid crystal shutter",
//             "White Light Output (Normal)=> 3,200lm ;",
//             "S/N=> X3SP9600024"
//         ]
//     ],
//     [
//         "code"=> "DOST9-EQ-070",
//         "type"=> "Split Type - Air Conditioner",
//         "name"=> "3.0 HP",
//         "brand"=> "KOLIN",
//         "model"=> "KSG-30B1M",
//         "serial_no"=> "",
//         "date_acquired"=> "07-20-11",
//         "value"=> "P 61,900.00",
//         "information"=> [
//             "S.N.=>\t\t10071008-14695"
//         ]
//     ],
//     [
//         "code"=> "DOST9-EQ-071",
//         "type"=> "LAPTOP COMPUTER",
//         "name"=> "RSTL CHEM1",
//         "brand"=> "HP",
//         "model"=> "Pavilion x360 14-cd0105TU",
//         "serial_no"=> "",
//         "date_acquired"=> "01-10-2019",
//         "value"=> "P 30,500.00",
//         "information"=> [
//             "S.N.=>\t\t8CG83311ZN"
//         ]
//     ],
//     [
//         "code"=> "DOST9-EQ-072",
//         "type"=> "LAPTOP COMPUTER",
//         "name"=> "RSTL MICRO1",
//         "brand"=> "HP",
//         "model"=> "Pavilion x360 14-cd0105TU",
//         "serial_no"=> "",
//         "date_acquired"=> "01-10-2019",
//         "value"=> "P 30,500.00",
//         "information"=> [
//             "S.N.=>\t\t8CG83311YT"
//         ]
//     ],
//     [
//         "code"=> "DOST9-EQ-073",
//         "type"=> "LAPTOP COMPUTER",
//         "name"=> "HR1",
//         "brand"=> "",
//         "model"=> "",
//         "serial_no"=> "",
//         "date_acquired"=> "09/05/2019",
//         "value"=> "P 35,916.40",
//         "information"=> [
//             "HP EliteBook x360 1030 G2",
//             "Intel i5-7200 @ 2.50GHz; 8 GB RAM",
//             "238.47 GB SSD; Windows 10",
//             "S/N=> 5CG849281Z"
//         ]
//     ],
//     [
//         "code"=> "DOST9-EQ-074",
//         "type"=> "ALL-IN-ONE COMPUTER",
//         "name"=> "ORD RD2)\n2nd PC unit at ZCIC",
//         "brand"=> "",
//         "model"=> "",
//         "serial_no"=> "",
//         "date_acquired"=> "07/26/2021",
//         "value"=> "P 46,299.00",
//         "information"=> [
//             "Acer C24-1651 AiO-PC",
//             "11th-Gen Intel i3-1115G4 @ 3.00GHz; 4 GB RAM",
//             "238.47 GB SSD + 1TB HDD; Windows 10 Home SL",
//             "S/N=> DQBG0SP001111018C63000"
//         ]
//     ],
//     [
//         "code"=> "DOST9-EQ-075",
//         "type"=> "LAPTOP COMPUTER",
//         "name"=> "RSTL RUBBER1",
//         "brand"=> "HP",
//         "model"=> "HP EliteBook x360 1030 G2",
//         "serial_no"=> "",
//         "date_acquired"=> "10-01-2019",
//         "value"=> "",
//         "information"=> [
//             "S.N.=>\t\t5CG84904VZ"
//         ]
//     ],
//     [
//         "code"=> "DOST9-EQ-076",
//         "type"=> "LAPTOP COMPUTER",
//         "name"=> "FASS ACCT1",
//         "brand"=> "HP",
//         "model"=> "HP EliteBook x360 1030 G2",
//         "serial_no"=> "",
//         "date_acquired"=> "08-10-2018",
//         "value"=> "P 30,500.00",
//         "information"=> [
//             "S.N.=>\t\t5CG849063C"
//         ]
//     ],
//     [
//         "code"=> "DOST9-EQ-077",
//         "type"=> "ALL-IN-ONE COMPUTER",
//         "name"=> "HR1",
//         "brand"=> "",
//         "model"=> "",
//         "serial_no"=> "",
//         "date_acquired"=> "08/13/2021",
//         "value"=> "P 46,299.00",
//         "information"=> [
//             "Acer C24-1650 AiO-PC",
//             "11th-Gen Intel i5-1135G7 @2.40GHz",
//             "8 GB RAM",
//             "238.47 GB SSD + 1TB WDC HDD",
//             "Windows 11 Home SL",
//             "S/N=> DQBFSSP00B150014313000"
//         ]
//     ],
//     [
//         "code"=> "DOST9-EQ-078",
//         "type"=> "Desktop Computer",
//         "name"=> "COA AUDITOR2",
//         "brand"=> "",
//         "model"=> "",
//         "serial_no"=> "6CR7181M7N)",
//         "date_acquired"=> "02-09-2018",
//         "value"=> "P 34,507.20",
//         "information"=> [
//             "Intel Core i7-6700 3.4 GHz",
//             "8 GB RAM;",
//             "1 TB 7200 RPM HDD",
//             "NVidia GeForce GT720 2GB GFX",
//             "Windows 10 Pro 64-bit",
//             "HP V223 21.5in. LED Monitor"
//         ]
//     ],
//     [
//         "code"=> "DOST9-EQ-079",
//         "type"=> "Desktop Computer",
//         "name"=> "ONELAB PC1",
//         "brand"=> "",
//         "model"=> "",
//         "serial_no"=> "",
//         "date_acquired"=> "07-10-2017",
//         "value"=> "P 34,507.20",
//         "information"=> [
//             "HP 280 G2 MT",
//             "Intel i7-6700 @ 3.40GHz",
//             "8 GB RAM; 1 TB WDC HDD",
//             "Windows 10 Pro",
//             "S/N=> 6CR7181M9X",
//             "HP V223 21.5in. LED Monitor"
//         ]
//     ],
//     [
//         "code"=> "DOST9-EQ-080",
//         "type"=> "LAPTOP COMPUTER",
//         "name"=> "FASS ACCT2",
//         "brand"=> "",
//         "model"=> "",
//         "serial_no"=> "",
//         "date_acquired"=> "05-03-2019",
//         "value"=> "\u20b1 41,500.00",
//         "information"=> [
//             "HP Pavilion x360 Convertible 14-ba076TU",
//             "Intel i3-7130 @ 2.70GHz",
//             "4 GB DDR4-2133 RAM",
//             "1 TB HGST SATA HDD",
//             "Windows 10 Pro 64-bit",
//             "S/N=> 8CG8084ZPB"
//         ]
//     ],
//     [
//         "code"=> "DOST9-EQ-081",
//         "type"=> "LCD PROJECTOR",
//         "name"=> "RSTL",
//         "brand"=> "Brand\t\tEPSON",
//         "model"=> "EB-W12",
//         "serial_no"=> "",
//         "date_acquired"=> "10-19-12",
//         "value"=> "P 36,500.00",
//         "information"=> [
//             "S.N.=>\t\tPS4F180063L"
//         ]
//     ],
//     [
//         "code"=> "DOST9-EQ-082",
//         "type"=> "LAPTOP COMPUTER",
//         "name"=> "FASS PURC1",
//         "brand"=> "",
//         "model"=> "",
//         "serial_no"=> "",
//         "date_acquired"=> "04-29-2019",
//         "value"=> "\u20b1 35,916.40",
//         "information"=> [
//             "Acer TravelMate P259-MG",
//             "Intel i7-7500 @ 2.90GHz",
//             "8 GB DDR4-2133 RAM",
//             "1 TB HDD; Windows 10 Pro 64-bit",
//             "S/N=> NXVEVSP014728088707600"
//         ]
//     ],
//     [
//         "code"=> "DOST9-EQ-083",
//         "type"=> "LAPTOP COMPUTER",
//         "name"=> "ORD RD1",
//         "brand"=> "DELL",
//         "model"=> "DELL LATITUDE 7210 2-IN-1",
//         "serial_no"=> "",
//         "date_acquired"=> "12-15-2020",
//         "value"=> "P 57,000.00",
//         "information"=> [
//             "S.N.=>\t\t14WZ473"
//         ]
//     ],
//     [
//         "code"=> "DOST9-EQ-084",
//         "type"=> "LAPTOP COMPUTER",
//         "name"=> "TS ZCHRD1",
//         "brand"=> "",
//         "model"=> "",
//         "serial_no"=> "",
//         "date_acquired"=> "12-12-2021",
//         "value"=> "\u20b195,925.00",
//         "information"=> [
//             "ACER PREDATOR HELIOS 300 (PH315-54)",
//             "11th Gen Intel i7-11800H @ 2.30GHz",
//             "16 GB RAM; 1 TB NVMe SSD",
//             "Windows 10 Home SL",
//             "S/N=> NHQC2SP00313416A9D3409"
//         ]
//     ],
//     [
//         "code"=> "DOST9-EQ-085",
//         "type"=> "LAPTOP COMPUTER",
//         "name"=> "TS ZCHRD2",
//         "brand"=> "",
//         "model"=> "",
//         "serial_no"=> "",
//         "date_acquired"=> "06-12-2022",
//         "value"=> "\u20b191,190.00",
//         "information"=> [
//             "HP ENVY x360 Convertible 13-ay1001AU",
//             "AMD Ryzen 7 5800U with 8GB",
//             "16 GB RAM; 1 TB NVMe SSD",
//             "Windows 10 Pro",
//             "S/N=> CND1465KTZ"
//         ]
//     ],
//     [
//         "code"=> "DOST9-EQ-086",
//         "type"=> "Split Type - Air Conditioner",
//         "name"=> "3.0 TONS)\n(Accounting",
//         "brand"=> "KOPPEL",
//         "model"=> "KFM36E20",
//         "serial_no"=> "",
//         "date_acquired"=> "12-27-12",
//         "value"=> "P 67,000.00",
//         "information"=> [
//             "S.N.=>\t\tFE800278"
//         ]
//     ],
//     [
//         "code"=> "DOST9-EQ-087",
//         "type"=> "Split Type - Air Conditioner",
//         "name"=> "3.0 TONS)\n(FOS",
//         "brand"=> "KOPPEL",
//         "model"=> "KFM36E2",
//         "serial_no"=> "",
//         "date_acquired"=> "12-27-12",
//         "value"=> "P 67,000.00",
//         "information"=> [
//             "S.N.=>\t\tFE800428"
//         ]
//     ],
//     [
//         "code"=> "DOST9-EQ-088",
//         "type"=> "ALL-IN-ONE COMPUTER",
//         "name"=> "CSTC-ZCIC AIOPC1",
//         "brand"=> "",
//         "model"=> "",
//         "serial_no"=> "",
//         "date_acquired"=> "10/02/2023",
//         "value"=> "P 46,299.00",
//         "information"=> [
//             "Acer C24-1750 AiO-PC",
//             "12th-Gen Intel i5-1240P @ 3.00GHz",
//             "8 GB; 238.47 GB SSD + 1TB WDC",
//             "Windows 11 Home SL",
//             "S/N=> DQBJ3SP001237027753000"
//         ]
//     ],
//     [
//         "code"=> "DOST9-EQ-089",
//         "type"=> "ALL-IN-ONE COMPUTER",
//         "name"=> "CSTC-ZCIC AIOPC6",
//         "brand"=> "",
//         "model"=> "",
//         "serial_no"=> "",
//         "date_acquired"=> "09/11/2022",
//         "value"=> "\u20b1 46,299.00",
//         "information"=> [
//             "Acer C24-1651 AiO-PC (MITHI 2021)",
//             "11th-G Intel i3-1115G4 @ 3.00GHz",
//             "4 GB RAM",
//             "238.47 GB SSD + 1TB WDC HDD",
//             "Windows 10 Home SL",
//             "S/N=> DQBG0SP001111018AE3000"
//         ]
//     ],
//     [
//         "code"=> "DOST9-EQ-090",
//         "type"=> "ALL-IN-ONE COMPUTER",
//         "name"=> "CSTC-ZCIC AIOPC2",
//         "brand"=> "",
//         "model"=> "",
//         "serial_no"=> "",
//         "date_acquired"=> "08/13/2021",
//         "value"=> "P 46,299.00",
//         "information"=> [
//             "Acer C24-1651 AiO-PC",
//             "11th-Gen Intel i3-1115G4 @3.00GHz",
//             "4 GB; 238.47 GB SSD + 1TB WDC HDD; Windows 10 Home SL",
//             "S/N=> DQBG0SP0011110189F3000"
//         ]
//     ],
//     [
//         "code"=> "DOST9-EQ-091",
//         "type"=> "LCD PROJECTOR",
//         "name"=> "ORD GAD1",
//         "brand"=> "EPSON",
//         "model"=> "EB-S18",
//         "serial_no"=> "",
//         "date_acquired"=> "06-15-15",
//         "value"=> "P 22,580.00",
//         "information"=> []
//     ],
//     [
//         "code"=> "DOST9-EQ-092",
//         "type"=> "ALL-IN-ONE COMPUTER",
//         "name"=> "FASS ACCT3",
//         "brand"=> "",
//         "model"=> "",
//         "serial_no"=> "DQBJ3SP0012370279C3000",
//         "date_acquired"=> "09/11/2022",
//         "value"=> "P 46,299.00",
//         "information"=> [
//             "ACER C24-1750 All-in-One PC",
//             "12th-Gen Intel i5-1240P @ 3.00GHz",
//             "8 GB RAM",
//             "238.47 SSD + 1TB HDD",
//             "Windows 11 HOME SL 64-bit"
//         ]
//     ],
//     [
//         "code"=> "DOST9-EQ-093",
//         "type"=> "ALL-IN-ONE COMPUTER",
//         "name"=> "RSTL AIOPC8 RUBBER1",
//         "brand"=> "",
//         "model"=> "",
//         "serial_no"=> "",
//         "date_acquired"=> "21/10/2020",
//         "value"=> "P 45,000.00",
//         "information"=> [
//             "Acer C24-960 AiO-PC",
//             "Intel i3-10110 @ 2.10GHz",
//             "4 GB; 238.47 GB SSD + 1TB WDC HDD; Windows 10 Home SL",
//             "S/N=> DQBD6SP0030280024C3000"
//         ]
//     ],
//     [
//         "code"=> "DOST9-EQ-094",
//         "type"=> "ALL-IN-ONE COMPUTER",
//         "name"=> "RSTL AIOPC7 CHEM3",
//         "brand"=> "",
//         "model"=> "",
//         "serial_no"=> "",
//         "date_acquired"=> "21/10/2020",
//         "value"=> "P 45,000.00",
//         "information"=> [
//             "Acer C24-960 AiO-PC",
//             "Intel i3-10110 @ 2.10GHz",
//             "4 GB; 238.47 GB SSD + 1TB WDC HDD; Windows 10 Home SL",
//             "S/N=> DQBD6SP003028002423000"
//         ]
//     ],
//     [
//         "code"=> "DOST9-EQ-095",
//         "type"=> "Split Type - Air Conditioner",
//         "name"=> "STIC / Secretary",
//         "brand"=> "CONCEPCION - CARRIER",
//         "model"=> "42CSH012308",
//         "serial_no"=> "",
//         "date_acquired"=> "06-13-14",
//         "value"=> "P 29,890.00",
//         "information"=> [
//             "S.N.=>\t\t0209042720213916170040"
//         ]
//     ],
//     [
//         "code"=> "DOST9-EQ-096",
//         "type"=> "Split Type - Air Conditioner",
//         "name"=> "Receiving/Rubber Lab",
//         "brand"=> "KOPPEL",
//         "model"=> "KFM36E0A",
//         "serial_no"=> "",
//         "date_acquired"=> "06-13-14",
//         "value"=> "P 70,000.00",
//         "information"=> [
//             "S.N.=>\t\tDG248089"
//         ]
//     ],
//     [
//         "code"=> "DOST9-EQ-097",
//         "type"=> "ALL-IN-ONE COMPUTER",
//         "name"=> "TS HALAL1",
//         "brand"=> "",
//         "model"=> "",
//         "serial_no"=> "",
//         "date_acquired"=> "06-12-2022",
//         "value"=> "\u20b141,190.00",
//         "information"=> [
//             "HP ALL-IN-ONE PC 24-f0033d",
//             "Intel i3-8130 @ 2.20GHz",
//             "4 GB RAM",
//             "512 SSD in Caddy + 1 TB HDD",
//             "Windows 11 Home SL",
//             "S/N=> 8CC83507YD"
//         ]
//     ],
//     [
//         "code"=> "DOST9-EQ-098",
//         "type"=> "ALL-IN-ONE COMPUTER",
//         "name"=> "ORD RD1)\n1st PC at ZCIC",
//         "brand"=> "",
//         "model"=> "",
//         "serial_no"=> "",
//         "date_acquired"=> "08-10-2018",
//         "value"=> "P 45,210.00",
//         "information"=> [
//             "HP Pavilion 24-B219D AiO PC (Touch)",
//             "Intel Corei3-7100T @ 3.4GHz",
//             "4GB DDR4-2133 SDRAM",
//             "1TB 7200 RPM SATA Hard Drive",
//             "NVidia GeForce 930MX 4GB GDDR5",
//             "Windows 10 64-bit",
//             "23.8\u201d diagonal FHD IPS anti-glare WLED-backlit (1920 x 1080)"
//         ]
//     ],
//     [
//         "code"=> "DOST9-EQ-099",
//         "type"=> "ALL-IN-ONE COMPUTER",
//         "name"=> "RSTL AIOPC1 CRO1",
//         "brand"=> "",
//         "model"=> "",
//         "serial_no"=> "DQBD6SP003028002333000",
//         "date_acquired"=> "21/10/2020",
//         "value"=> "P 45,000.00",
//         "information"=> [
//             "ACER C24-960 All-in-One PC",
//             "Intel Core i3-10110 2.20 GHz",
//             "4 GB DDR4-2133 RAM",
//             "238.47 SSD + 1TB HDD",
//             "Windows 10 Pro 64-bit"
//         ]
//     ],
//     [
//         "code"=> "DOST9-EQ-100",
//         "type"=> "Split Type - Air Conditioner",
//         "name"=> "2.5 HP) (Server Room",
//         "brand"=> "KOPPEL",
//         "model"=> "KV24WM-ARF21C2",
//         "serial_no"=> "",
//         "date_acquired"=> "09-21-20",
//         "value"=> "P 74,992.50",
//         "information"=> [
//             "S.N.=>\t\tLM584741"
//         ]
//     ],
//     [
//         "code"=> "DOST9-EQ-101",
//         "type"=> "Split Type - Air Conditioner",
//         "name"=> "2.0 HP) (Sample Prep/Rubber Lab",
//         "brand"=> "KOPPEL",
//         "model"=> "KV18WM-ARF21B",
//         "serial_no"=> "",
//         "date_acquired"=> "10-20-15",
//         "value"=> "P 39,995.00",
//         "information"=> [
//             "S.N.=>\t\tGH580888"
//         ]
//     ],
//     [
//         "code"=> "DOST9-EQ-102",
//         "type"=> "ALL-IN-ONE COMPUTER",
//         "name"=> "FASS SUPP1",
//         "brand"=> "",
//         "model"=> "",
//         "serial_no"=> "DQBFSSP00B150014333000",
//         "date_acquired"=> "28/04/2022",
//         "value"=> "P 46,299.00",
//         "information"=> [
//             "ACER C24-1650 All-in-One PC",
//             "11th-G Intel i5-1135G7 @ 2.40GHz",
//             "8 GB DDR4-2133 RAM",
//             "238.47 SSD + 1TB HDD",
//             "Windows 10 Home SL"
//         ]
//     ],
//     [
//         "code"=> "DOST9-EQ-103",
//         "type"=> "Desktop Computer",
//         "name"=> "FOS RPMO PC1",
//         "brand"=> "",
//         "model"=> "",
//         "serial_no"=> "",
//         "date_acquired"=> "07-10-2017",
//         "value"=> "P 34,507.20",
//         "information"=> [
//             "HP 280 G2 MT",
//             "Intel i7-6700 @ 3.40GHz",
//             "8 GB RAM; 1 TB WDC HDD;",
//             "Windows 10 Pro",
//             "S/N=> 6CR7181M8T"
//         ]
//     ],
//     [
//         "code"=> "DOST9-EQ-104",
//         "type"=> "Split Type - Air Conditioner",
//         "name"=> "2.0 HP) (Wet Room/ Chem Lab",
//         "brand"=> "KOPPEL",
//         "model"=> "KV18WM-ARF21",
//         "serial_no"=> "",
//         "date_acquired"=> "03-17-16",
//         "value"=> "P 42,950.00",
//         "information"=> [
//             "S.N.=>\t\tHG583161"
//         ]
//     ],
//     [
//         "code"=> "DOST9-EQ-105",
//         "type"=> "Split Type - Air Conditioner",
//         "name"=> "3.0 HP) (Scholarship Section",
//         "brand"=> "KOPPEL",
//         "model"=> "KV36FU-ARF21",
//         "serial_no"=> "",
//         "date_acquired"=> "05-23-16",
//         "value"=> "P 91,920.00",
//         "information"=> [
//             "S.N.=>\t\tMH581480"
//         ]
//     ],
//     [
//         "code"=> "DOST9-EQ-106",
//         "type"=> "LAPTOP COMPUTER",
//         "name"=> "ICT HLPC1",
//         "brand"=> "ACER Aspire VX",
//         "model"=> "VX5-591G-70ME",
//         "serial_no"=> "",
//         "date_acquired"=> "05-10-2017",
//         "value"=> "P 62,250.00",
//         "information"=> [
//             "S.N.=>\t\tNHGM4SP002710066C93400"
//         ]
//     ],
//     [
//         "code"=> "DOST9-EQ-107",
//         "type"=> "ALL-IN-ONE COMPUTER",
//         "name"=> "ORD NSTEP1",
//         "brand"=> "",
//         "model"=> "",
//         "serial_no"=> "",
//         "date_acquired"=> "08/13/2021",
//         "value"=> "P 46,299.00",
//         "information"=> [
//             "Acer C24-1651 AiO-PC",
//             "11th-Gen Intel i3-1115G4P @ 3GHz",
//             "4 GB RAM",
//             "238.47 GB SSD + 1TB WDC HDD",
//             "Windows 11 Home SL",
//             "S/N=> DQBG0SP001111021893000"
//         ]
//     ],
//     [
//         "code"=> "DOST9-EQ-108",
//         "type"=> "ALL-IN-ONE COMPUTER",
//         "name"=> "FASS CASH3",
//         "brand"=> "",
//         "model"=> "",
//         "serial_no"=> "",
//         "date_acquired"=> "09/11/2022",
//         "value"=> "\u20b1 46,299.00",
//         "information"=> [
//             "HP ALL-IN-ONE PC 24-f0033d;",
//             "Intel i3-8130 @ 2.20GHz",
//             "4 GB; 1TB WDC HDD",
//             "Windows 10 Home SL",
//             "S/N=> 8CC83507ZF"
//         ]
//     ],
//     [
//         "code"=> "DOST9-EQ-109",
//         "type"=> "ALL-IN-ONE COMPUTER",
//         "name"=> "CSTC-ZCIC AIOPC7",
//         "brand"=> "",
//         "model"=> "",
//         "serial_no"=> "DQBFSSP00512701F043000",
//         "date_acquired"=> "08/06/2021",
//         "value"=> "P 46,299.00",
//         "information"=> [
//             "ACER C24-1650 All-in-One PC",
//             "11th-Gen Intel i5-1135G7 @2.40GHz",
//             "8 GB DDR4-2133 RAM",
//             "238.47 SSD + 1TB HDD",
//             "Windows 10 Pro 64-bit"
//         ]
//     ],
//     [
//         "code"=> "DOST9-EQ-110",
//         "type"=> "ALL-IN-ONE COMPUTER",
//         "name"=> "CSTC-ZCIC AIOPC3",
//         "brand"=> "",
//         "model"=> "",
//         "serial_no"=> "",
//         "date_acquired"=> "09/11/2022",
//         "value"=> "P 46,299.00",
//         "information"=> [
//             "Acer C24-1750 AiO-PC",
//             "12th-Gen Intel i5-1240P @ 3.00GHz",
//             "8 GB RAM; 238.47 GB SSD + 1TB WDC HDD; Windows 10 Home SL",
//             "S/N=> DQBG0SP0011110218C3000"
//         ]
//     ],
//     [
//         "code"=> "DOST9-EQ-111",
//         "type"=> "ALL-IN-ONE COMPUTER",
//         "name"=> "CSTC-ZCIC AIOPC4",
//         "brand"=> "",
//         "model"=> "",
//         "serial_no"=> "",
//         "date_acquired"=> "08/13/2021",
//         "value"=> "P 46,299.00",
//         "information"=> [
//             "Acer C24-1651 AiO-PC",
//             "11th-Gen Intel i3-1115G4 @3.00GHz",
//             "4 GB; 238.47 GB SAMSUNG SSD + 1TB WDC HDD",
//             "Windows 10 Home SL",
//             "S/N=> DQBG0SP0011110218C3000"
//         ]
//     ],
//     [
//         "code"=> "DOST9-EQ-112",
//         "type"=> "Desktop Computer",
//         "name"=> "FOS RPMO PC2",
//         "brand"=> "",
//         "model"=> "",
//         "serial_no"=> "",
//         "date_acquired"=> "07-10-2017",
//         "value"=> "P 34,507.20",
//         "information"=> [
//             "HP 280 G2 MT",
//             "Intel i7-6700 @ 3.40GHz",
//             "8 GB RAM;",
//             "1 TB WDC HDD",
//             "Windows 10 Pro",
//             "S/N=> 6CR7213CZ2"
//         ]
//     ],
//     [
//         "code"=> "DOST9-EQ-113",
//         "type"=> "ALL-IN-ONE COMPUTER",
//         "name"=> "FOS RPMO1",
//         "brand"=> "",
//         "model"=> "",
//         "serial_no"=> "",
//         "date_acquired"=> "08/13/2021",
//         "value"=> "P 46,299.00",
//         "information"=> [
//             "Acer C24-1750 AiO-PC",
//             "12th-Gen Intel i5-1240P @ 3.00GHz",
//             "8 GB RAM",
//             "238.47 GB SSD + 1TB WDC HDD",
//             "Windows 11 Home SL",
//             "S/N=> DQBJ3SP001237027833000"
//         ]
//     ],
//     [
//         "code"=> "DOST9-EQ-114",
//         "type"=> "ALL-IN-ONE COMPUTER",
//         "name"=> "CSTC-ZCIC AIOPC5",
//         "brand"=> "",
//         "model"=> "",
//         "serial_no"=> "",
//         "date_acquired"=> "08/13/2021",
//         "value"=> "P 46,299.00",
//         "information"=> [
//             "Acer C24-1750 AiO-PC",
//             "11th-Gen Intel i3-1115G4 @3.00GHz",
//             "4 GB",
//             "238.47 GB SAMSUNG SSD + 1TB WDC HDD",
//             "Windows 10 Home SL",
//             "S/N=> DQBJ3SP001237027563000"
//         ]
//     ],
//     [
//         "code"=> "DOST9-EQ-115",
//         "type"=> "ALL-IN-ONE COMPUTER",
//         "name"=> "GAD HUBSTATION1",
//         "brand"=> "",
//         "model"=> "",
//         "serial_no"=> "8CC8100YJY",
//         "date_acquired"=> "05-29-2017",
//         "value"=> "P 41,000.00",
//         "information"=> [
//             "HP Pavilion 24 (All-in-one PC)",
//             "Intel Core i3-4150T 3.0 GHz",
//             "4 GB DDR3L RAM;n1 TB SATA HDD",
//             "Windows 10 Pro 64-bit",
//             "21.5in. Touch Screen (Multi-touch)"
//         ]
//     ],
//     [
//         "code"=> "DOST9-EQ-116",
//         "type"=> "LAPTOP COMPUTER",
//         "name"=> "ONELAB LP-4",
//         "brand"=> "",
//         "model"=> "",
//         "serial_no"=> "",
//         "date_acquired"=> "11-28-2023",
//         "value"=> "\u20b1 62,200.00",
//         "information"=> [
//             "APPLE MacBook Air (M1, 2020)",
//             "Apple M1",
//             "MacOS Ventura 13.5",
//             "8 GB RAM; 256GB SSD",
//             "S/N=> HXJLD2B11WFV"
//         ]
//     ],
//     [
//         "code"=> "DOST9-EQ-117",
//         "type"=> "LAPTOP COMPUTER",
//         "name"=> "ICT HTLAPTOP6",
//         "brand"=> "",
//         "model"=> "",
//         "serial_no"=> "",
//         "date_acquired"=> "11/10/2021",
//         "value"=> "P 65,299.00",
//         "information"=> [
//             "MSI GF65 Thin 10UE",
//             "Intel i7-10750 @ 2.60 GHz",
//             "16 GB",
//             "512 GB SSD Micron_2210 SSD",
//             "Windows 10 Home SL",
//             "S/N=> K2107N0134502"
//         ]
//     ],
//     [
//         "code"=> "DOST9-EQ-118",
//         "type"=> "LAPTOP COMPUTER",
//         "name"=> "ICT HTLAPTOP7",
//         "brand"=> "",
//         "model"=> "",
//         "serial_no"=> "",
//         "date_acquired"=> "11/10/2021",
//         "value"=> "P 65,299.00",
//         "information"=> [
//             "MSI GF65 Thin 10UE",
//             "Intel i7-10750 @ 2.60 GHz",
//             "16 GB",
//             "512 GB SSD Micron_2210 SSD",
//             "Windows 10 Home SL",
//             "S/N=> K2107N0134351"
//         ]
//     ],
//     [
//         "code"=> "DOST9-EQ-119",
//         "type"=> "LAPTOP COMPUTER",
//         "name"=> "ICT HTLAPTOP8",
//         "brand"=> "",
//         "model"=> "",
//         "serial_no"=> "",
//         "date_acquired"=> "11/10/2021",
//         "value"=> "P 65,299.00",
//         "information"=> [
//             "MSI GF65 Thin 10UE",
//             "Intel i7-10750 @ 2.60 GHz",
//             "16 GB",
//             "512 GB SSD Micron_2210 SSD",
//             "Windows 10 Home SL",
//             "S/N=> K2107N0134423"
//         ]
//     ],
//     [
//         "code"=> "DOST9-EQ-120",
//         "type"=> "LAPTOP COMPUTER",
//         "name"=> "ICT HTLAPTOP9",
//         "brand"=> "",
//         "model"=> "",
//         "serial_no"=> "",
//         "date_acquired"=> "11/10/2021",
//         "value"=> "P 65,299.00",
//         "information"=> [
//             "MSI GF65 Thin 10UE",
//             "Intel i7-10750 @ 2.60 GHz",
//             "16 GB",
//             "512 GB SSD Micron_2210 SSD",
//             "Windows 10 Home SL",
//             "S/N=> K2107N0134359"
//         ]
//     ],
//     [
//         "code"=> "DOST9-EQ-121",
//         "type"=> "LAPTOP COMPUTER",
//         "name"=> "ICT HTLAPTOP10",
//         "brand"=> "",
//         "model"=> "",
//         "serial_no"=> "",
//         "date_acquired"=> "11/10/2021",
//         "value"=> "P 65,299.00",
//         "information"=> [
//             "MSI GF65 Thin 10UE",
//             "Intel i7-10750 @ 2.60 GHz",
//             "16 GB",
//             "512 GB SSD Micron_2210 SSD",
//             "Windows 10 Home SL",
//             "S/N=> K2107N0134328"
//         ]
//     ],
//     [
//         "code"=> "DOST9-EQ-122",
//         "type"=> "LAPTOP COMPUTER",
//         "name"=> "ICT HTLAPTOP11",
//         "brand"=> "",
//         "model"=> "",
//         "serial_no"=> "",
//         "date_acquired"=> "11/10/2021",
//         "value"=> "P 65,299.00",
//         "information"=> [
//             "MSI GF65 Thin 10UE",
//             "Intel i7-10750 @ 2.60 GHz",
//             "16 GB",
//             "512 GB SSD Micron_2210 SSD",
//             "Windows 10 Home SL",
//             "S/N=> K2107N0134458"
//         ]
//     ],
//     [
//         "code"=> "DOST9-EQ-123",
//         "type"=> "ALL-IN-ONE COMPUTER",
//         "name"=> "RSTL AIOPC4 CHEM4",
//         "brand"=> "",
//         "model"=> "",
//         "serial_no"=> "DQBD6SP0030280025D3000",
//         "date_acquired"=> "21/10/2020",
//         "value"=> "P 45,000.00",
//         "information"=> [
//             "ACER C24-960 All-in-One PC",
//             "Intel Core i3-10110 2.20 GHz",
//             "4 GB DDR4-2133 RAM",
//             "238.47 SSD + 1TB HDD",
//             "Windows 10 Home SL"
//         ]
//     ],
//     [
//         "code"=> "DOST9-EQ-124",
//         "type"=> "LAPTOP COMPUTER",
//         "name"=> "ORD PLANNING",
//         "brand"=> "HP",
//         "model"=> "HP EliteBook x360 1030 G2",
//         "serial_no"=> "",
//         "date_acquired"=> "11-15-2019",
//         "value"=> "P 45,000.00",
//         "information"=> [
//             "S.N.=>\t\t5CG84902V8"
//         ]
//     ],
//     [
//         "code"=> "DOST9-EQ-125",
//         "type"=> "ALL-IN-ONE COMPUTER",
//         "name"=> "RSTL AIOPC5 MICRO2",
//         "brand"=> "",
//         "model"=> "",
//         "serial_no"=> "",
//         "date_acquired"=> "09/11/2022",
//         "value"=> "P 35,916.40",
//         "information"=> [
//             "HP ALL-IN-ONE PC 24-f0033d;",
//             "Intel i3-8130 @ 2.20GHz",
//             "4 GB; 1TB WDC HDD",
//             "Windows 10 Home SL",
//             "S/N=> 8CC83507YN"
//         ]
//     ],
//     [
//         "code"=> "DOST9-EQ-126",
//         "type"=> "ALL-IN-ONE COMPUTER",
//         "name"=> "ORD PLANNING",
//         "brand"=> "",
//         "model"=> "",
//         "serial_no"=> "DQBD6SP0030280024A3000",
//         "date_acquired"=> "21/10/2020",
//         "value"=> "P 45,000.00",
//         "information"=> [
//             "ACER C24-960 All-in-One PC",
//             "Intel Core i3-10110 2.20 GHz",
//             "4 GB DDR4-2133 RAM",
//             "238.47 SSD + 1TB HDD",
//             "Windows 10 Pro 64-bit"
//         ]
//     ],
//     [
//         "code"=> "DOST9-EQ-127",
//         "type"=> "Laptop Computer",
//         "name"=> "RSTL METRO1",
//         "brand"=> "",
//         "model"=> "",
//         "serial_no"=> "NXK5BSP0022350DC4D3400",
//         "date_acquired"=> "05/03/2023",
//         "value"=> "P 36,999.00",
//         "information"=> [
//             "ACER Aspire 5 A514-55-330C",
//             "Intel Core i3-1215U",
//             "8 GB RAM",
//             "512GB NVMe SSD",
//             "Windows 11 Home SL 64-bit"
//         ]
//     ],
//     [
//         "code"=> "DOST9-EQ-128",
//         "type"=> "Laptop Computer",
//         "name"=> "RSTL METRO2",
//         "brand"=> "",
//         "model"=> "",
//         "serial_no"=> "NXK5BSP0022350DD773400",
//         "date_acquired"=> "05/03/2023",
//         "value"=> "P 36,999.00",
//         "information"=> [
//             "ACER Aspire 5 A514-55-330C",
//             "Intel Core i3-1215U",
//             "8 GB RAM",
//             "512GB NVMe SSD",
//             "Windows 11 Home SL 64-bit"
//         ]
//     ],
//     [
//         "code"=> "DOST9-EQ-129",
//         "type"=> "Laptop Computer",
//         "name"=> "RSTL METRO3",
//         "brand"=> "",
//         "model"=> "",
//         "serial_no"=> "NXK5BSP0022350DDE03400",
//         "date_acquired"=> "05/03/2023",
//         "value"=> "P 36,999.00",
//         "information"=> [
//             "ACER Aspire 5 A514-55-330C",
//             "Intel Core i3-1215U",
//             "8 GB RAM",
//             "512GB NVMe SSD",
//             "Windows 11 Home SL 64-bit"
//         ]
//     ],
//     [
//         "code"=> "DOST9-EQ-130",
//         "type"=> "Laptop Computer",
//         "name"=> "RSTL METRO4",
//         "brand"=> "",
//         "model"=> "",
//         "serial_no"=> "NXK5BSP0022350DE0A3400",
//         "date_acquired"=> "05/03/2023",
//         "value"=> "P 36,999.00",
//         "information"=> [
//             "ACER Aspire 5 A514-55-330C",
//             "Intel Core i3-1215U",
//             "8 GB RAM",
//             "512GB NVMe SSD",
//             "Windows 11 Home SL 64-bit"
//         ]
//     ],
//     [
//         "code"=> "DOST9-EQ-131",
//         "type"=> "LAPTOP COMPUTER",
//         "name"=> "ICT HTLAPTOP2",
//         "brand"=> "",
//         "model"=> "",
//         "serial_no"=> "",
//         "date_acquired"=> "04-11-2019",
//         "value"=> "\u20b1 134,900.00",
//         "information"=> [
//             "DELL XPS 15 9570",
//             "Intel i7-8750 @ 2.90GHz",
//             "16 GB RAM; 512 GB NVMe SSD",
//             "Windows 10 Pro 64-bit",
//             "S/N=> 74ZG6S2"
//         ]
//     ],
//     [
//         "code"=> "DOST9-EQ-132",
//         "type"=> "LAPTOP COMPUTER",
//         "name"=> "ICT HTLAPTOP3",
//         "brand"=> "",
//         "model"=> "",
//         "serial_no"=> "",
//         "date_acquired"=> "04-11-2019",
//         "value"=> "\u20b1 134,900.00",
//         "information"=> [
//             "DELL XPS 15 9570",
//             "Intel i7-8750 @ 2.90GHz",
//             "16 GB RAM; 512 GB NVMe SSD",
//             "Windows 10 Pro 64-bit",
//             "S/N=> 8QWHVT2"
//         ]
//     ],
//     [
//         "code"=> "DOST9-EQ-133",
//         "type"=> "LAPTOP COMPUTER",
//         "name"=> "ICT HTLAPTOP4",
//         "brand"=> "",
//         "model"=> "",
//         "serial_no"=> "",
//         "date_acquired"=> "04-11-2019",
//         "value"=> "\u20b1 134,900.00",
//         "information"=> [
//             "DELL XPS 15 9570",
//             "Intel i7-8750 @ 2.90GHz",
//             "16 GB RAM; 512 GB NVMe SSD",
//             "Windows 10 Pro 64-bit",
//             "S/N=> G9SG6S2"
//         ]
//     ],
//     [
//         "code"=> "DOST9-EQ-134",
//         "type"=> "ALL-IN-ONE COMPUTER",
//         "name"=> "RSTLONELAB AIO1",
//         "brand"=> "",
//         "model"=> "",
//         "serial_no"=> "",
//         "date_acquired"=> "12-01-2023",
//         "value"=> "\u20b1 46,853.00",
//         "information"=> [
//             "HP All-in-One 24 - cr0035d",
//             "Intel Core i3-1315U @ 1.2 GHz",
//             "8 GB RAM; 512 GB NVMe SSD",
//             "Windows 11",
//             "S/N=> 8CC3360HXW"
//         ]
//     ],
//     [
//         "code"=> "DOST9-EQ-135",
//         "type"=> "ALL-IN-ONE COMPUTER",
//         "name"=> "RSTLONELAB AIO2",
//         "brand"=> "",
//         "model"=> "",
//         "serial_no"=> "",
//         "date_acquired"=> "12-01-2023",
//         "value"=> "\u20b1 46,853.00",
//         "information"=> [
//             "HP All-in-One 24 - cr0035d",
//             "Intel Core i3-1315U @ 1.2 GHz",
//             "8 GB RAM; 512 GB NVMe SSD",
//             "Windows 11",
//             "S/N=> 8CC3360HY8"
//         ]
//     ],
//     [
//         "code"=> "DOST9-EQ-136",
//         "type"=> "ALL-IN-ONE COMPUTER",
//         "name"=> "RSTLONELAB AIO3",
//         "brand"=> "",
//         "model"=> "",
//         "serial_no"=> "",
//         "date_acquired"=> "12-01-2023",
//         "value"=> "\u20b1 46,853.00",
//         "information"=> [
//             "HP All-in-One 24 - cr0035d",
//             "Intel Core i3-1315U @ 1.2 GHz",
//             "8 GB RAM; 512 GB NVMe SSD",
//             "Windows 11; S/N=> 8CC3360HY1"
//         ]
//     ],
//     [
//         "code"=> "DOST9-EQ-137",
//         "type"=> "LAPTOP COMPUTER",
//         "name"=> "TS STIC2",
//         "brand"=> "",
//         "model"=> "",
//         "serial_no"=> "",
//         "date_acquired"=> "04-23-2019",
//         "value"=> "\u20b1 41,500.00",
//         "information"=> [
//             "HP Pavilion x360 Convertible 14-ba0xx",
//             "Intel i3-7130 @ 2.70GHz",
//             "4 GB RAM; 1 TB HGST HDD; Windows 10 Pro; S/N=> 8CG8327LYD"
//         ]
//     ],
//     [
//         "code"=> "DOST9-EQ-138",
//         "type"=> "LAPTOP COMPUTER",
//         "name"=> "RSTL CHEM3",
//         "brand"=> "",
//         "model"=> "",
//         "serial_no"=> "",
//         "date_acquired"=> "05-03-2019",
//         "value"=> "\u20b1 41,500.00",
//         "information"=> [
//             "HP Pavilion x360 Convertible 14-ba076TU",
//             "Intel i3-7130 @ 2.70GHz",
//             "4 GB RAM; 1 TB HGST; Windows 10 Pro 64-bit; S/N=> 8CG8084ZPB"
//         ]
//     ],
//     [
//         "code"=> "DOST9-EQ-139",
//         "type"=> "ALL-IN-ONE COMPUTER",
//         "name"=> "FASS BUDG3",
//         "brand"=> "",
//         "model"=> "",
//         "serial_no"=> "DQBFSSP00512701EFA3000",
//         "date_acquired"=> "28/04/2022",
//         "value"=> "P 46,299.00",
//         "information"=> [
//             "ACER C24-1650 All-in-One PC",
//             "11th-G Intel i5-1135G7 @ 2.40GHz",
//             "8 GB DDR4-2133 RAM",
//             "238.47 SSD + 1TB HDD",
//             "Windows 10 Home SL"
//         ]
//     ],
//     [
//         "code"=> "DOST9-EQ-140",
//         "type"=> "LAPTOP COMPUTER",
//         "name"=> "CSTC-ZCIC LAPTOP1",
//         "brand"=> "",
//         "model"=> "",
//         "serial_no"=> "",
//         "date_acquired"=> "08-14-2020",
//         "value"=> "P 47,995.00",
//         "information"=> [
//             "ACER Aspire A514-52G",
//             "Intel Core i7-10510U @ 1.80GHz",
//             "4GB RAM; 238.47 GB SSD / 1TB HDD; NVIDIA GeForce MX350 4GB; Windows 10 Home SL",
//             "S/N=> NXHT2SP00102109E2A2N00"
//         ]
//     ],
//     [
//         "code"=> "DOST9-EQ-141",
//         "type"=> "LAPTOP COMPUTER",
//         "name"=> "RSTL LAPTOP MET1",
//         "brand"=> "HP",
//         "model"=> "HP EliteBook x360 1030 G2",
//         "serial_no"=> "",
//         "date_acquired"=> "02-11-2020",
//         "value"=> "\u20b1 41,500.00",
//         "information"=> [
//             "S.N.=>\t\t5CG8490D6H"
//         ]
//     ],
//     [
//         "code"=> "DOST9-EQ-142",
//         "type"=> "LCD PROJECTOR",
//         "name"=> "FOS RPMO",
//         "brand"=> "",
//         "model"=> "",
//         "serial_no"=> "",
//         "date_acquired"=> "09-12-2023",
//         "value"=> "\u20b1 45,000.00",
//         "information"=> [
//             "EPSON EB-E10 XGA",
//             "S/N=> X89V1Z01177"
//         ]
//     ],
//     [
//         "code"=> "DOST9-EQ-143",
//         "type"=> "LCD PROJECTOR",
//         "name"=> "TS ZCHRD",
//         "brand"=> "",
//         "model"=> "",
//         "serial_no"=> "",
//         "date_acquired"=> "09-12-2023",
//         "value"=> "\u20b1 42,900.00",
//         "information"=> [
//             "EPSON EB-W51",
//             "S/N=> X8A93500558"
//         ]
//     ],
//     [
//         "code"=> "DOST9-EQ-144",
//         "type"=> "Split Type - Air Conditioner",
//         "name"=> "2.5 HP) (ORD",
//         "brand"=> "KOPPEL",
//         "model"=> "KV24WM-ARF21C2/",
//         "serial_no"=> "",
//         "date_acquired"=> "09-11-2020",
//         "value"=> "P 74,992.50",
//         "information"=> [
//             "KV24OD-ARF21C2",
//             "S.N.=>\t\tGM585135/DM621743"
//         ]
//     ],
//     [
//         "code"=> "DOST9-EQ-145",
//         "type"=> "ALL-IN-ONE COMPUTER",
//         "name"=> "ONELAB AIOPC1",
//         "brand"=> "",
//         "model"=> "",
//         "serial_no"=> "",
//         "date_acquired"=> "09/11/2022",
//         "value"=> "\u20b1 46,299.00",
//         "information"=> [
//             "Acer C24-1750 AiO-PC (MITHI 2022)",
//             "12th-Gen Intel i5-1240P @ 3.00GHz",
//             "8 GB RAM; 238.47 GB SSD + 1TB WDC HDD; Windows 11 Home SL",
//             "S/N=> DQBJ3SP0012370275E3000"
//         ]
//     ],
//     [
//         "code"=> "DOST9-EQ-146",
//         "type"=> "Split Type - Air Conditioner",
//         "name"=> "2.5 HP) (ORD SECRETARY",
//         "brand"=> "KOPPEL",
//         "model"=> "KV18WM-ARF21B",
//         "serial_no"=> "",
//         "date_acquired"=> "10-20-2015",
//         "value"=> "P 39,995.00",
//         "information"=> [
//             "S.N.=>\t\tGH580756"
//         ]
//     ],
//     [
//         "code"=> "DOST9-EQ-147",
//         "type"=> "Desktop Computer",
//         "name"=> "CSTC-ZCIC FOS PC2",
//         "brand"=> "",
//         "model"=> "",
//         "serial_no"=> "",
//         "date_acquired"=> "07-10-2017",
//         "value"=> "\u20b1 34,507.20",
//         "information"=> [
//             "HP 280 G2 MT",
//             "Intel i7-6700 @ 3.40GHz;",
//             "8 GB RAM",
//             "1 TB WDC SATA HDD;",
//             "Windows 10",
//             "S/N=> 6CR7213CMY"
//         ]
//     ],
//     [
//         "code"=> "DOST9-EQ-148",
//         "type"=> "LAPTOP COMPUTER",
//         "name"=> "ONELAB LP-5",
//         "brand"=> "",
//         "model"=> "",
//         "serial_no"=> "",
//         "date_acquired"=> "11-29-2023",
//         "value"=> "\u20b1 80,517.00",
//         "information"=> [
//             "GIGABYTE Notebook RC55",
//             "Intel Core i5-12500H @ 2.5 GHz",
//             "16 GB RAM; 1 TB SDD; Windows 11",
//             "S/N=> SN23161J003023"
//         ]
//     ],
//     [
//         "code"=> "DOST9-EQ-149",
//         "type"=> "LAPTOP COMPUTER",
//         "name"=> "ONELAB LP-6",
//         "brand"=> "",
//         "model"=> "",
//         "serial_no"=> "",
//         "date_acquired"=> "11-29-2023",
//         "value"=> "\u20b1 80,517.00",
//         "information"=> [
//             "GIGABYTE Notebook RC55",
//             "Intel Core i5-12500H @ 2.5 GHz",
//             "16 GB RAM; 1 TB SDD; Windows 11",
//             "S/N=> SN23161J003015"
//         ]
//     ],
//     [
//         "code"=> "DOST9-EQ-150",
//         "type"=> "Desktop Computer",
//         "name"=> "CSTC-ZCIC FOS PC3",
//         "brand"=> "",
//         "model"=> "",
//         "serial_no"=> "",
//         "date_acquired"=> "07-10-2017",
//         "value"=> "P 34,507.20",
//         "information"=> [
//             "HP 280 G2 MT",
//             "Intel i7-6700 @ 3.40GHz",
//             "8 GB RAM; 1 TB WDC HDD",
//             "Windows 10 Pro",
//             "S/N=> 6CR7213CXQ"
//         ]
//     ],
//     [
//         "code"=> "DOST9-EQ-151",
//         "type"=> "ALL-IN-ONE COMPUTER",
//         "name"=> "FASS CASH2",
//         "brand"=> "",
//         "model"=> "",
//         "serial_no"=> "",
//         "date_acquired"=> "09/11/2022",
//         "value"=> "\u20b1 46,299.00",
//         "information"=> [
//             "HP ALL-IN-ONE PC 24-f0033d;",
//             "Intel i3-8130 @ 2.20GHz",
//             "4 GB; 1TB WDC HDD",
//             "Windows 10 Home SL",
//             "S/N=> 8CC83507Z0"
//         ]
//     ],
//     [
//         "code"=> "DOST9-EQ-152",
//         "type"=> "LCD PROJECTOR",
//         "name"=> "TS",
//         "brand"=> "",
//         "model"=> "H976C",
//         "serial_no"=> "",
//         "date_acquired"=> "12/15/2023",
//         "value"=> "\u20b1 27,990.00",
//         "information"=> [
//             "EPSON EB-X51;",
//             "3,800 Lumens; XGA Resolution",
//             "S/N=> X8A43800753"
//         ]
//     ],
//     [
//         "code"=> "DOST9-EQ-153",
//         "type"=> "LCD PROJECTOR",
//         "name"=> "FASS",
//         "brand"=> "",
//         "model"=> "H976C",
//         "serial_no"=> "",
//         "date_acquired"=> "12/15/2023",
//         "value"=> "\u20b1 27,990.00",
//         "information"=> [
//             "EPSON EB-X51;",
//             "3,800 Lumens; XGA Resolution",
//             "S/N=> X8A43801011"
//         ]
//     ],
//     [
//         "code"=> "DOST9-EQ-154",
//         "type"=> "LCD PROJECTOR",
//         "name"=> "ORD",
//         "brand"=> "",
//         "model"=> "H976C",
//         "serial_no"=> "",
//         "date_acquired"=> "12/15/2023",
//         "value"=> "\u20b1 27,990.00",
//         "information"=> [
//             "EPSON EB-X51;",
//             "3,800 Lumens; XGA Resolution",
//             "S/N=> X8A43800919"
//         ]
//     ],
//     [
//         "code"=> "DOST9-EQ-155",
//         "type"=> "Desktop Computer",
//         "name"=> "RSTL PC1 CHEM1",
//         "brand"=> "",
//         "model"=> "",
//         "serial_no"=> "3CQ715071G)",
//         "date_acquired"=> "06-02-2017",
//         "value"=> "P 34,507.20",
//         "information"=> [
//             "Intel Core i7-6700 3.4 GHz",
//             "8 GB RAM; 1 TB 7200 RPM HDD",
//             "NVidia GeForce GT720 2GB GFX",
//             "Windows 10 Pro 64-bit"
//         ]
//     ],
//     [
//         "code"=> "DOST9-EQ-156",
//         "type"=> "Desktop Computer",
//         "name"=> "FASS PC5",
//         "brand"=> "",
//         "model"=> "",
//         "serial_no"=> "",
//         "date_acquired"=> "07-10-2017",
//         "value"=> "P 34,507.20",
//         "information"=> [
//             "HP 280 G2 MT",
//             "Intel i7-6700 @ 3.40GHz; 8 GB RAM; 1 TB WDC HDD; Windows 10 Pro",
//             "S/N=> 6CR7181M01"
//         ]
//     ],
//     [
//         "code"=> "DOST9-EQ-157",
//         "type"=> "Air Conditioner",
//         "name"=> "Metro Lab",
//         "brand"=> "",
//         "model"=> "",
//         "serial_no"=> "",
//         "date_acquired"=> "",
//         "value"=> "",
//         "information"=> []
//     ],
//     [
//         "code"=> "DOST9-EQ-158",
//         "type"=> "Split Type - Air Conditioner",
//         "name"=> "Micro Lab",
//         "brand"=> "",
//         "model"=> "",
//         "serial_no"=> "",
//         "date_acquired"=> "",
//         "value"=> "",
//         "information"=> []
//     ],
//     [
//         "code"=> "DOST9-EQ-159",
//         "type"=> "Split Type - Air Conditioner",
//         "name"=> "Rubber Lab",
//         "brand"=> "",
//         "model"=> "",
//         "serial_no"=> "",
//         "date_acquired"=> "",
//         "value"=> "",
//         "information"=> []
//     ],
//     [
//         "code"=> "DOST9-EQ-160",
//         "type"=> "Split Type - Air Conditioner",
//         "name"=> "Receiving/Rubber Lab",
//         "brand"=> "",
//         "model"=> "",
//         "serial_no"=> "",
//         "date_acquired"=> "",
//         "value"=> "",
//         "information"=> []
//     ],
//     [
//         "code"=> "DOST9-EQ-161",
//         "type"=> "Laptop Computer",
//         "name"=> "ORD-DRRM2",
//         "brand"=> "",
//         "model"=> "",
//         "serial_no"=> "",
//         "date_acquired"=> "",
//         "value"=> "",
//         "information"=> []
//     ],
//     [
//         "code"=> "DOST9-EQ-162",
//         "type"=> "Laptop Computer",
//         "name"=> "TOS-RPMO1",
//         "brand"=> "",
//         "model"=> "",
//         "serial_no"=> "",
//         "date_acquired"=> "",
//         "value"=> "",
//         "information"=> []
//     ]
// ];

return $assets;
        return 'wew';
        // $time = Carbon::createFromTimestamp(1750119565)->format('g:i A');
//         $timestamp = 1750119565;
// $time = date('H:i:s', $timestamp); 
//         return $time;

        // $startOfMonth = Carbon::now()->startOfMonth()->toDateString(); // e.g., '2025-06-01'
        // $endOfMonth = Carbon::now()->endOfMonth()->toDateString();     // e.g., '2025-06-30'
        // $dtrs = OldDtr::with('user')->whereBetween('date', [$startOfMonth, $endOfMonth])->get();
        // // return $dtrs;
        // foreach($dtrs as $dtr){
        //     $user = User::with('profile','organization.division')->where('username',strtolower($dtr->user->username))->first();
        //     if($user){
        //         $remarks = [
        //             'tardiness' => null,
        //             'undertime' => null
        //         ]; 
        //         $amin = $dtr->inAM 
        //         ? [
        //             'ip' => $dtr->ip,
        //             'pcname' => gethostname(),
        //             'browser' => $request->header('User-Agent'),
        //             'time' =>  date('H:i:s',$dtr->inAM),
        //             'date' => $dtr->date,
        //             'is_updated' => false,
        //             'changes' => []
        //         ] 
        //         : null;

        //     $amout = $dtr->outAM 
        //         ? [
        //             'ip' => $dtr->ip,
        //             'pcname' => gethostname(),
        //             'browser' => $request->header('User-Agent'),
        //             'time' => date('H:i:s',$dtr->outAM),
        //             'date' => $dtr->date,
        //             'is_updated' => false,
        //             'changes' => []
        //         ] 
        //         : null;

        //     $pmin = $dtr->inPM 
        //         ? [
        //             'ip' => $dtr->ip,
        //             'pcname' => gethostname(),
        //             'browser' => $request->header('User-Agent'),
        //             'time' => date('H:i:s',$dtr->inPM),
        //             'date' => $dtr->date,
        //             'is_updated' => false,
        //             'changes' => []
        //         ] 
        //         : null;

        //         $pmout = $dtr->outPM 
        //         ? [
        //             'ip' => $dtr->ip,
        //             'pcname' => gethostname(),
        //             'browser' => $request->header('User-Agent'),
        //             'time' => date('H:i:s',$dtr->outPM),
        //             'date' => $dtr->date,
        //             'is_updated' => false,
        //             'changes' => []
        //         ] 
        //         : null;

        //         $data = new Dtr;
        //         $data->date = $dtr->date;
        //         $data->am_in_at = ($dtr->inAM) ? json_encode($amin) : null;
        //         $data->am_out_at = ($dtr->outAM) ? json_encode($amout) : null;
        //         $data->pm_in_at = ($dtr->inPM) ? json_encode($pmin) : null;
        //         $data->pm_out_at =  ($dtr->outPM) ? json_encode($pmout) : null;
        //         $data->remarks = json_encode($remarks);
        //         $data->user_id = $user->id;
        //         $data->save();
        //         $success[] = $dtr->user->username;
        //     }else{
        //         $failed[] = $dtr->user->username;
        //     }
        // }
        // return [$success,array_unique($failed)];


        // $employees = Employee::where('is_active',1)->get();
        // foreach($employees as $employee){
        //     $user = User::create([
        //         'username' => $employee->username,
        //         'email' => ($employee->email) ? $employee->email : $employee->username.'@gmail.com',
        //         'password' => bcrypt($employee->username.'!@#$%'),
        //         'created_at' => $employee->created_at,
        //         'updated_at' => $employee->updated_at,
        //     ]);
        //     if($user){
        //         $profile = $user->profile()->create([
        //             'firstname' => $employee->first_name,
        //             'middlename' => $employee->middle_name,
        //             'lastname' => $employee->last_name,
        //             'suffix' => $employee->name_suffix,
        //             'sex' => 'Male',
        //             'birthdate' => now(),
        //             'contact_no' => '09123456789',
        //             'avatar' => ($employee->picture) ? $employee->picture : 'avatar.jpg',
        //             'signature' => ($employee->signature) ? $employee->signature : 'signature.jpg',
        //             'marital_id' => 1,
        //             'religion_id' => 1,
        //             'blood_id' => 1,
        //         ]);

        //         if($profile){
        //             $user->organization()->create([
        //                 'status_id' => 2,
        //                 'type_id' => $this->status($employee->employee_status_id),
        //                 'position_id' => 1,
        //                 'division_id' => 1,
        //                 'unit_id' => 1,
        //                 'station_id' => 1
        //             ]);

        //             $this->information($user->id);
        //         }
        //     }
        // }

        if(!\Auth::check()){
            return inertia('Auth/Login');
        }else{
            return inertia('Modules/Executive/Dashboard/Index');
        }
    }

    private function information($id){
        $accounts = [
            ["name" => "Pag-Ibig","number" => null,"deduction" => null, "is_contribution" => true],
            ["name" => "SSS","number" => null, "deduction" => null, "is_contribution" => true],
            ["name" => "GSIS", "number" => null, "deduction" => null, "is_contribution" => true],
            ["name" => "PhilHealth", "number" => null, "deduction" => null, "is_contribution" => true],
            ["name" => "TIN",  "number" => null, "deduction" => null, "is_contribution" => false],
            ["name" => "LandBank", "number" => null, "deduction" => null, "is_contribution" => false]
        ];
        
        $family = [
            "parents" => [
                "father" => [
                    "name" => null,
                    "address" => null,
                ],
                "mother" => [
                    "name" => null,
                    "address" => null,
                ]
            ],
            "spouse" => [
                "name" => null,
                "address" => null,
                "contact_no" => null,
                "occupation" => null,
                "company" => null,
            ],
            "children" => []
        ];

        $contacts = [
            "home_address" => [
                "region" => null,
                "province" => null,
                "municipality" => null,
                "barangay" => null,
                "street" => null,
                "zip_code" => null
            ],
            "permanent_address" => [
                "region" => null,
                "province" => null,
                "municipality" => null,
                "barangay" => null,
                "street" => null,
                "zip_code" => null
            ],
            "emergency_contact" => [
                "name" => null,
                "relationship" => null,
                "contact_no" => null,
                "address" => [
                    "region" => null,
                    "province" => null,
                    "municipality" => null,
                    "barangay" => null,
                    "street" => null
                ]
            ]
        ];

        UserInformation::create([
            'accounts' => json_encode($accounts),
            'backgrounds' => json_encode($family),
            'contacts' => json_encode($contacts),
            'user_id' => $id
        ]);
        
        UserRole::create([
            'role_id' => 5,
            'created_at' => now(),
            'updated_at' => now(),
            'user_id' => $id
        ]);
    }

    public function status($status){
        switch($status){
            case '3':
                return 15;
            break;
            case '2':
                return 17;
            break;
            case '1':
                return 16;
            break;
        }
    }

    public function search(Request $request){
        $option = $request->option;
        switch($option){
            case 'provinces':
                return $this->dropdown->provinces($request->code);
            break;
            case 'municipalities':
                return $this->dropdown->municipalities($request->code);
            break;
            case 'barangays':
                return $this->dropdown->barangays($request->code);
            break;
            case 'units':
                return $this->dropdown->units($request->code);
            break;
            case 'users':
                return $this->dropdown->users($request->keyword);
            break;
        }
    }
}
