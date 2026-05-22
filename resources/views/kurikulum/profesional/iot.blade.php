@php
    $modules = [
        [
            'title' => 'What is IoT? - Definition, Topology, Features and Applications',
            'items' => ['Definition of IoT', 'IoT Topology', 'IoT Features', 'IoT Applications'],
        ],
        [
            'title' => 'Detection',
            'items' => ['What is a sensor?', 'Examples of sensors', 'Data acquisition: analog vs. digital', 'How is the data acquired?'],
        ],
        [
            'title' => 'Description of IoT devices',
            'items' => [
                'Introduction',
                'Layers of the IoT',
                'IoT device or object layer',
                'Definition of a SoC (System on Chip)',
                'ESP8266 Description',
                'ESP32 Description',
                'Description of the Raspberry pi',
                'Description of the Microchip IoT development board: AVR IoT WG development board',
            ],
        ],
        [
            'title' => 'What is ESP32? - Description of the IoT-oriented ESP32',
            'items' => [
                'Introduction',
                'Types of ESP32 products (Chips, modules and cards)',
                'ESP32 DEVKIT V1 Card Description',
                'DOWDQ6 chip description',
                'ESP32 DEVKIT V1 Card Features',
                'Operating modes between WiFi and ESP32',
                'Station mode',
                'Station+client mode',
                'Station+server mode',
                'Modo Access Point',
                'Modo Access Point+servidor',
            ],
        ],
        [
            'title' => 'Wireless connectivity in the IoT - LPWAN networks (LoRa, Sigfox and NB-IoT)',
            'items' => [
                'Introduction',
                'LAN networks',
                'Cellular networks',
                'LPWAN networks or technologies',
                'Comparison of LPWAN networks with other types of networks',
                'LoRa',
                'Sigfox',
                'NB-IoT',
                'Comparison between LoRa, Sigfox and NB-IoT',
            ],
        ],
        [
            'title' => 'LoRa and LoRaWAN - The future of IoT',
            'items' => [
                'Introduction',
                'What is LoRa?',
                'LoRa Alliance (LoRa Alianza)',
                'What is LoRaWAN?',
                'LoRaWAN network architecture',
                'Adaptive data rate',
                'Types of nodes (devices) in LoRaWAN',
                'Class A nodes (devices) in LoRaWAN',
                'Class C nodes (devices) in LoRaWAN',
                'Uplink and Downlink',
                'Comparison of Class A and Class C Nodes',
                'Class B nodes (devices) in LoRaWAN',
            ],
        ],
        [
            'title' => 'Mobile networks - Wireless connectivity in the IoT',
            'items' => [
                'Introduction',
                'Definition of Mobile Network and GSM standard',
                'Coverage area and GSM Bands',
                'Generations of mobile networks',
                'Mobile Networks in the IoT',
                'Mobile operators in Peru',
                'Hardware SIMCOM (SIM900, SIM808, SIM868 y SIM800L)',
                'Features of the SIM900 and SIM800L',
            ],
        ],
        [
            'title' => 'What is a network server (Network Server)? - Definition of IaaS, PaaS and SaaS',
            'items' => [
                'Introduction',
                'What is Network Server?',
                'Client - Server Model',
                'Internet network',
                'Cloud Pyramid',
                'Infrastructure as a service (IaaS)',
                'IaaS examples: AWS, Rackspace, Digital Ocean, etc.',
                'Platform as a Service (PaaS)',
                'PaaS examples: Ubidots, Blynk, ThingSpeak, etc.',
                'Software as a service (SaaS)',
                'SaaS Examples: Solutions created in Ubidots or Node Red',
            ],
        ],
        [
            'title' => 'Computing',
            'items' => [
                'Edge vs. Edge Computing Cloud computing',
                'Data management',
                'Algorithms',
                'Programming languages',
                'IoT hardware: CPU architectures, I/O Interfaces (UART, I2C, SPI), Communications (wired, wireless), Market boards (Raspberry PI, Arduino, BeagleBone)',
            ],
        ],
        [
            'title' => 'What is Amazon Web Services (AWS)? - IoT-oriented AWS services',
            'items' => [
                'Introduction',
                'Amazon Web Services',
                'Important AWS Services',
                'AWS Compute Services',
                'AWS Database Services',
                'AWS IoT Services',
                'Advantages of AWS',
                'Disadvantages of AWS',
            ],
        ],
        [
            'title' => 'Common Protocols. HTTP protocol (definition, advantages, operation, ...)',
            'items' => [
                'Introduction',
                'HTTP Protocol',
                'Advantages of the HTTP Protocol',
                'Features of the HTTP Protocol',
                'The URLs',
                'HTTP communication methods: GET and POST',
                'How HTTP communication works',
            ],
        ],
        [
            'title' => 'Common protocols. REST, API, RESTFull',
            'items' => [
                'What is an API? A look at this important backend technology.',
                'What is REST or RESTful: Know its power',
                'API Documentation, Specifications and Definitions.',
                'What is API documentation?',
                'What is an API specification?',
                'Characteristics for an API to be considered REST',
                'Why should we use REST?',
                'Advantages of REST',
            ],
        ],
        [
            'title' => 'Common Protocols. All about the MQTT Protocol',
            'items' => [
                'Introduction',
                'Description of the MQTT protocol (advantages)',
                'MQTT message structure',
                'Components of the MQTT topology',
                'Forms of communication',
                'MQTT communication example',
                'MQTT Features',
                'MQTT parameters (clients and broker)',
                'MQTT in different programming languages',
            ],
        ],
        [
            'title' => 'Industry 4.0 and Industrial Protocols: OPC UA and Sparkplug B',
            'items' => [
                'Introduction',
                'Industry 4.0',
                'Characteristics of the Industry 4.0',
                'Industrial Protocols (IIoT)',
                'OPC UA',
                'Principal features of OPC UA',
                'Differences between OPC UA and OPC Classic',
                'OPC UA client/server',
                'Practical example',
                'OPC UA pub/sub',
                'OPC UA over TSN',
                'MQTT Sparkplug B',
                'What is Sparkplug B?',
                'What is store and forward?',
                'What does Sparkplug B do?',
                'Why do we use Sparkplug B?',
                'What is the application of Sparkplug B?',
            ],
        ],
        [
            'title' => 'Coding data',
            'items' => [
                'JSON Syntax - The Best Way to Transfer Data',
                'What is JSON?',
                'The Syntax',
                'To that Does a JSON file serve?',
                'Where is JSON used?',
                'What are the benefits of the JSON format?',
                'JSON vs. XML',
                'JSON and its language independence',
                'Methods of serialization and deserialization',
                'Signed JSON',
            ],
        ],
        [
            'title' => 'Location',
            'items' => [
                'GPS',
                'GPS in IoT',
                'GPS applications in technology IoT',
                'Combination GPS with 4G/LTE',
                'Combination GPS with networks wireless of area personal (WPAN)',
                'Future Trends of IoT-Based GPS Tracking Systems',
                'Non-GPS techniques',
            ],
        ],
    ];
@endphp

<x-kurikulum cssFile="course" cssKurikulum=true>    <x-course.hero
        eyebrow="Professional"
        title="Professional IoT"
        tagline="Akuisisi data dari dunia fisik ke cloud â€” sensor, ESP32, LoRaWAN, MQTT, dan industri 4.0." />

    <x-course.section eyebrow="Overview" title="Tentang program" variant="overview">
        <p>Kursus ini dirancang untuk mempelajari segala hal tentang IoT. Internet of Things atau IoT pada dasarnya bertujuan untuk memperoleh informasi dari lingkungan fisik dan mengirimkan informasi tersebut ke internet. Manfaat dari jaringan ini adalah karena sangat padat pengguna dan mudah diakses.</p>
        <p>Tujuan mengirimkan informasi ke internet adalah agar data tersebut dapat disimpan, diproses, dianalisis, diotomatisasi, dan direpresentasikan. Analisis dari informasi ini akan menghasilkan data yang berguna untuk pengambilan keputusan. Informasi berguna atau metrik inilah yang menjadi perhatian utama bagi perusahaan.</p>
    </x-course.section>

    <x-course.section eyebrow="Kurikulum" title="Modul IoT">
        <x-course.curriculum :modules="$modules" />
    </x-course.section>

    <x-course.cta />
</x-kurikulum>

