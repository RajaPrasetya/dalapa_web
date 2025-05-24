<?php

namespace Database\Seeders;

use App\Models\Material;
use Illuminate\Database\Seeder;

class MaterialTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $materials = [
            // Kabel Fiber Optik
            ['id_material' => 'FO-SM12', 'name' => 'Kabel Fiber Optik Single Mode G.652D 12 Core', 'quantity' => 500, 'price' => 12500000],
            ['id_material' => 'FO-SM24', 'name' => 'Kabel Fiber Optik Single Mode G.652D 24 Core', 'quantity' => 350, 'price' => 22000000],
            ['id_material' => 'FO-MM48', 'name' => 'Kabel Fiber Optik Multi Mode OM4 48 Core', 'quantity' => 200, 'price' => 35000000],
            ['id_material' => 'FO-DW1', 'name' => 'Kabel Drop Wire Fiber Optik 1 Core', 'quantity' => 2000, 'price' => 3500],
            ['id_material' => 'FO-IN8', 'name' => 'Kabel Fiber Optik Indoor 8 Core', 'quantity' => 300, 'price' => 6500000],
            
            // Kabel Tembaga dan Coaxial
            ['id_material' => 'CB-UT6', 'name' => 'Kabel UTP Cat6 Outdoor', 'quantity' => 500, 'price' => 1500000],
            ['id_material' => 'CB-FT5', 'name' => 'Kabel FTP Cat5e Outdoor', 'quantity' => 450, 'price' => 1300000],
            ['id_material' => 'CB-CX6', 'name' => 'Kabel Coaxial RG6', 'quantity' => 350, 'price' => 750000],
            ['id_material' => 'CB-CX11', 'name' => 'Kabel Coaxial RG11 Headend', 'quantity' => 200, 'price' => 1250000],
            ['id_material' => 'CB-FD7', 'name' => 'Kabel Feeder 7/8"', 'quantity' => 150, 'price' => 3500000],
            
            // Patch Cord & Jumper
            ['id_material' => 'PC-SCLC3', 'name' => 'Patch Cord Fiber Optik SC-LC 3m', 'quantity' => 650, 'price' => 175000],
            ['id_material' => 'PC-SCSC5', 'name' => 'Patch Cord Fiber Optik SC-SC 5m', 'quantity' => 500, 'price' => 200000],
            ['id_material' => 'PC-LCLC2', 'name' => 'Patch Cord Fiber Optik LC-LC 2m', 'quantity' => 450, 'price' => 165000],
            ['id_material' => 'PC-RJ45', 'name' => 'Patch Cord UTP RJ45 1m', 'quantity' => 1000, 'price' => 15000],
            ['id_material' => 'PC-RJ45L3', 'name' => 'Patch Cord UTP RJ45 3m', 'quantity' => 800, 'price' => 25000],
            
            // Konektor & Adaptor
            ['id_material' => 'CN-SCUPC', 'name' => 'Konektor SC/UPC', 'quantity' => 2000, 'price' => 8500],
            ['id_material' => 'CN-SCAPC', 'name' => 'Konektor SC/APC', 'quantity' => 1500, 'price' => 9000],
            ['id_material' => 'CN-LCUPC', 'name' => 'Konektor LC/UPC', 'quantity' => 1200, 'price' => 12000],
            ['id_material' => 'CN-FCUPC', 'name' => 'Konektor FC/UPC', 'quantity' => 800, 'price' => 15000],
            ['id_material' => 'AD-SCUPC', 'name' => 'Adaptor SC/UPC Simplex', 'quantity' => 1000, 'price' => 7500],
            ['id_material' => 'AD-SCAPC', 'name' => 'Adaptor SC/APC Simplex', 'quantity' => 950, 'price' => 8000],
            ['id_material' => 'AD-LCUPC', 'name' => 'Adaptor LC/UPC Duplex', 'quantity' => 750, 'price' => 18000],
            ['id_material' => 'CN-RJ45', 'name' => 'Konektor RJ45 Cat6', 'quantity' => 5000, 'price' => 2500],
            ['id_material' => 'CN-BNC', 'name' => 'Konektor BNC untuk CCTV', 'quantity' => 1500, 'price' => 5000],
            ['id_material' => 'SP-PLC8', 'name' => 'Splitter PLC 1:8', 'quantity' => 350, 'price' => 120000],
            ['id_material' => 'SP-PLC16', 'name' => 'Splitter PLC 1:16', 'quantity' => 250, 'price' => 250000],
            
            // ODP & OTB & ODC
            ['id_material' => 'ODP-8C', 'name' => 'ODP (Optical Distribution Point) 8 Core', 'quantity' => 200, 'price' => 350000],
            ['id_material' => 'ODP-16C', 'name' => 'ODP (Optical Distribution Point) 16 Core', 'quantity' => 150, 'price' => 650000],
            ['id_material' => 'ODC-96C', 'name' => 'ODC (Optical Distribution Cabinet) 96 Core', 'quantity' => 50, 'price' => 15000000],
            ['id_material' => 'ODC-144C', 'name' => 'ODC (Optical Distribution Cabinet) 144 Core', 'quantity' => 30, 'price' => 22500000],
            ['id_material' => 'OTB-4C', 'name' => 'OTB (Optical Terminal Box) 4 Core', 'quantity' => 300, 'price' => 150000],
            ['id_material' => 'OTB-12C', 'name' => 'OTB (Optical Terminal Box) 12 Core', 'quantity' => 250, 'price' => 450000],
            ['id_material' => 'OTB-24C', 'name' => 'OTB (Optical Terminal Box) 24 Core', 'quantity' => 150, 'price' => 750000],
            
            // ONT & OLT
            ['id_material' => 'ONT-F609', 'name' => 'ONT ZTE F609', 'quantity' => 750, 'price' => 350000],
            ['id_material' => 'ONT-F660', 'name' => 'ONT ZTE F660', 'quantity' => 650, 'price' => 650000],
            ['id_material' => 'ONT-HW845', 'name' => 'ONT Huawei HG8245H', 'quantity' => 600, 'price' => 550000],
            ['id_material' => 'ONT-ALU', 'name' => 'ONT Alcatel-Lucent I-240W-A', 'quantity' => 400, 'price' => 625000],
            ['id_material' => 'OLT-ZTE16', 'name' => 'OLT ZTE C320 16 Port', 'quantity' => 20, 'price' => 120000000],
            ['id_material' => 'OLT-HW8T', 'name' => 'OLT Huawei MA5608T', 'quantity' => 15, 'price' => 85000000],
            ['id_material' => 'OLT-FH5S', 'name' => 'OLT Fiberhome 5516-01', 'quantity' => 12, 'price' => 95000000],
            
            // Router & Switch
            ['id_material' => 'RT-RB2011', 'name' => 'Router Mikrotik RB2011UiAS', 'quantity' => 85, 'price' => 2100000],
            ['id_material' => 'RT-CCR1009', 'name' => 'Router Mikrotik CCR1009', 'quantity' => 45, 'price' => 8500000],
            ['id_material' => 'RT-CS1941', 'name' => 'Router Cisco 1941', 'quantity' => 35, 'price' => 15000000],
            ['id_material' => 'RT-ASR9001', 'name' => 'Router Cisco ASR 9001', 'quantity' => 12, 'price' => 250000000],
            ['id_material' => 'SW-CS2960', 'name' => 'Switch Cisco Catalyst 2960 24 Port', 'quantity' => 60, 'price' => 8500000],
            ['id_material' => 'SW-CS3850', 'name' => 'Switch Cisco Catalyst 3850 48 Port', 'quantity' => 30, 'price' => 45000000],
            ['id_material' => 'SW-JUN4300', 'name' => 'Switch Juniper EX4300 24 Port', 'quantity' => 25, 'price' => 60000000],
            
            // Peralatan Instalasi & Pengukuran
            ['id_material' => 'TL-FUSION', 'name' => 'Fusion Splicer Sumitomo T-72C', 'quantity' => 25, 'price' => 85000000],
            ['id_material' => 'TL-OTDR', 'name' => 'OTDR Yokogawa AQ7275', 'quantity' => 15, 'price' => 120000000],
            ['id_material' => 'TL-PWTM', 'name' => 'Power Meter Optical FOT-300', 'quantity' => 40, 'price' => 5500000],
            ['id_material' => 'TL-LSRC', 'name' => 'Light Source Optical FLS-300', 'quantity' => 35, 'price' => 6500000],
            ['id_material' => 'TL-FOXKIT', 'name' => 'Toolkit Fiber Optik', 'quantity' => 50, 'price' => 1200000],
            ['id_material' => 'TL-NETKIT', 'name' => 'Toolkit Jaringan', 'quantity' => 65, 'price' => 850000],
            ['id_material' => 'TL-CBLMTR', 'name' => 'Cable Meter Digital', 'quantity' => 45, 'price' => 1500000],
            ['id_material' => 'TL-CRIMPER', 'name' => 'Tang Crimping RJ45/RJ11', 'quantity' => 80, 'price' => 350000],
            ['id_material' => 'TL-TESTER', 'name' => 'LAN Tester', 'quantity' => 70, 'price' => 250000],
            
            // Tiang & Pengikat
            ['id_material' => 'IF-PLVNS2', 'name' => 'Pipa Galvanis 2 inch', 'quantity' => 120, 'price' => 350000],
            ['id_material' => 'IF-CLMP', 'name' => 'Clamp Tiang', 'quantity' => 500, 'price' => 45000],
            ['id_material' => 'IF-SUSPN', 'name' => 'Suspension Clamp', 'quantity' => 450, 'price' => 35000],
            ['id_material' => 'IF-HOOK', 'name' => 'Pengait Kabel (Hook)', 'quantity' => 600, 'price' => 15000],
            ['id_material' => 'IF-KLMRNG', 'name' => 'Klem Ring untuk Kabel', 'quantity' => 1000, 'price' => 5000],
            ['id_material' => 'IF-TNG7', 'name' => 'Tiang Besi 7 Meter', 'quantity' => 65, 'price' => 1500000],
            ['id_material' => 'IF-TNG9', 'name' => 'Tiang Besi 9 Meter', 'quantity' => 45, 'price' => 2500000],
            ['id_material' => 'IF-ODPTNG', 'name' => 'Tiang Untuk ODP', 'quantity' => 85, 'price' => 750000],
            
            // Power & Backup
            ['id_material' => 'PW-UPS3K', 'name' => 'UPS 3000VA', 'quantity' => 35, 'price' => 12000000],
            ['id_material' => 'PW-UPS1.5K', 'name' => 'UPS 1500VA', 'quantity' => 60, 'price' => 5500000],
            ['id_material' => 'PW-GNS10K', 'name' => 'Genset 10000 Watt', 'quantity' => 15, 'price' => 85000000],
            ['id_material' => 'PW-STB5K', 'name' => 'Stabilizer 5000VA', 'quantity' => 25, 'price' => 3500000],
            ['id_material' => 'PW-BAT7.2', 'name' => 'Baterai 12V 7.2Ah', 'quantity' => 200, 'price' => 350000],
            ['id_material' => 'PW-BAT100', 'name' => 'Baterai VRLA 12V 100Ah', 'quantity' => 80, 'price' => 1800000],
            ['id_material' => 'PW-PNLIND', 'name' => 'Panel Listrik Indoor', 'quantity' => 45, 'price' => 2500000],
            
            // Keamanan & Monitoring
            ['id_material' => 'MT-CCTVDM', 'name' => 'CCTV Dome Indoor', 'quantity' => 85, 'price' => 750000],
            ['id_material' => 'MT-CCTVBL', 'name' => 'CCTV Bullet Outdoor', 'quantity' => 65, 'price' => 1250000],
            ['id_material' => 'MT-DVR16', 'name' => 'DVR 16 Channel', 'quantity' => 30, 'price' => 3500000],
            ['id_material' => 'MT-TEMPHU', 'name' => 'Sensor Suhu dan Kelembaban', 'quantity' => 50, 'price' => 850000],
            ['id_material' => 'MT-SMOKE', 'name' => 'Sensor Asap', 'quantity' => 70, 'price' => 450000],
            ['id_material' => 'MT-ALARM', 'name' => 'Alarm System', 'quantity' => 40, 'price' => 1500000],
            ['id_material' => 'MT-ACCESS', 'name' => 'Access Control System', 'quantity' => 25, 'price' => 4500000],
            
            // Rack & Kabinet
            ['id_material' => 'RK-SR42U', 'name' => 'Rak Server 42U', 'quantity' => 20, 'price' => 8500000],
            ['id_material' => 'RK-SR22U', 'name' => 'Rak Server 22U', 'quantity' => 30, 'price' => 4500000],
            ['id_material' => 'RK-KBT12U', 'name' => 'Kabinet Outdoor 12U', 'quantity' => 40, 'price' => 6500000],
            ['id_material' => 'RK-KBT9U', 'name' => 'Kabinet Indoor 9U', 'quantity' => 50, 'price' => 2500000],
            ['id_material' => 'RK-FOTRAY', 'name' => 'Tray Fiber Optik', 'quantity' => 120, 'price' => 350000],
            ['id_material' => 'RK-CBLMNG', 'name' => 'Cable Manager', 'quantity' => 150, 'price' => 250000],
            ['id_material' => 'RK-PDU', 'name' => 'Power Distribution Unit (PDU)', 'quantity' => 60, 'price' => 750000],
            
            // Perangkat IndiHome & Smart Home
            ['id_material' => 'STB-IH', 'name' => 'Set Top Box IndiHome', 'quantity' => 800, 'price' => 550000],
            ['id_material' => 'CAM-IPCAM', 'name' => 'IP Camera Indoor HD', 'quantity' => 180, 'price' => 650000],
            ['id_material' => 'NET-WFEXT', 'name' => 'WiFi Extender', 'quantity' => 250, 'price' => 350000],
            ['id_material' => 'STB-SMART', 'name' => 'Smart TV Box', 'quantity' => 200, 'price' => 850000],
            ['id_material' => 'IOT-GWAY', 'name' => 'Gateway IoT', 'quantity' => 120, 'price' => 1200000],
            ['id_material' => 'IOT-CTRL', 'name' => 'Smart Home Controller', 'quantity' => 95, 'price' => 950000],
            ['id_material' => 'IOT-SPKR', 'name' => 'Speaker Smart', 'quantity' => 150, 'price' => 750000],
            
            // Media Penyimpanan
            ['id_material' => 'HDD-ENT8', 'name' => 'Hard Drive Enterprise 8TB', 'quantity' => 50, 'price' => 4500000],
            ['id_material' => 'SSD-SVR1', 'name' => 'SSD Server 1TB', 'quantity' => 70, 'price' => 3500000],
            ['id_material' => 'NAS-24TB', 'name' => 'NAS Storage 24TB', 'quantity' => 18, 'price' => 25000000],
            ['id_material' => 'USB-32GB', 'name' => 'Flash Drive 32GB', 'quantity' => 250, 'price' => 120000],
            ['id_material' => 'HDD-EXT2', 'name' => 'External Hard Drive 2TB', 'quantity' => 60, 'price' => 1500000],
            
            // Alat Pelindung & Keselamatan
            ['id_material' => 'SF-HELMET', 'name' => 'Safety Helmet', 'quantity' => 120, 'price' => 150000],
            ['id_material' => 'SF-SHOES', 'name' => 'Safety Shoes', 'quantity' => 100, 'price' => 650000],
            ['id_material' => 'SF-BELT', 'name' => 'Safety Belt untuk Instalasi Tower', 'quantity' => 50, 'price' => 850000],
            ['id_material' => 'SF-GLOVE', 'name' => 'Sarung Tangan Anti Statik', 'quantity' => 180, 'price' => 75000],
            ['id_material' => 'SF-VEST', 'name' => 'Rompi Safety', 'quantity' => 130, 'price' => 125000],
            
            // Lain-lain
            ['id_material' => 'AC-SILICA', 'name' => 'Serat Silika Gel', 'quantity' => 300, 'price' => 45000],
            ['id_material' => 'AC-SPRWRP', 'name' => 'Spiral Wrapping 10mm', 'quantity' => 200, 'price' => 35000],
            ['id_material' => 'AC-CBLLAB', 'name' => 'Label Kabel', 'quantity' => 3500, 'price' => 1500],
            ['id_material' => 'AC-TYRAP', 'name' => 'Ty Rap Cable Ties 20cm', 'quantity' => 5000, 'price' => 500],
            ['id_material' => 'AC-TAPE', 'name' => 'Electrical Tape', 'quantity' => 350, 'price' => 12000],
        ];

        foreach ($materials as $material) {
            Material::create($material);
        }
    }
}
