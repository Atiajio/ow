<?php

/**
 * Security script access
 */
defined('ROOT') OR exit('No direct script access allowed');



class OW_Base_Db_Element implements OW_Db_Element_Interface {

    /**
     * Global values
     */
    /**
     * Data types
     */
    /**
     * Numbre
     */
    private bool $numberType;

    public const TINYINT = 'TINYINT';
    public const SMALLINT = 'SMALLINT';
    public const MEDIUMINT = 'MEDIUMINT';
    public const INT = 'INT';
    public const BIGINT = 'BIGINT';
    public const DECIMAL = 'DECIMAL';
    public const FLOAT = 'FLOAT';
    public const DOUBLE = 'DOUBLE';
    public const REAL = 'REAL';
    public const BIT = 'BIT';
    public const BOOLEAN = 'BOOLEAN';
    public const SERIAL = 'SERIAL';
    /**
     * Temps
     */
    private bool $dateType;

    public const DATE = 'DATE';
    public const DATETIME = 'DATETIME';
    public const TIMESTAMP = 'TIMESTAMP';
    public const TIME = 'TIME';
    public const YEAR = 'YEAR';
    /**
     * Chaine de caratere
     */
    private bool $varcharType;

    public const CHAR = 'CHAR';
    public const VARCHAR = 'VARCHAR';
    public const TINYTEXT = 'TINYTEXT';
    public const TEXT = 'TEXT';
    public const MEDIUMTEXT = 'MEDIUMTEXT';
    public const LONGTEXT = 'LONGTEXT';
    public const BINARY = 'BINARY';
    public const VARBINARY = 'VARBINARY';
    public const TINYBLOB = 'TINYBLOB';
    public const BLOB = 'BLOB';
    public const MEDIUMBLOB = 'MEDIUMBLOB';
    public const LONGBLOB = 'LONGBLOB';
    public const ENUM = 'ENUM';
    public const SET = 'SET';
    /**
     * Espace
     */
    private bool $espaceType;

    public const GEOMETRY = 'GEOMETRY';
    public const POINT = 'POINT';
    public const LINESTRING = 'LINESTRING';
    public const POLYGON = 'POLYGON';
    public const MULTIPOINT = 'MULTIPOINT';
    public const MULTILINESTRING = 'MULTILINESTRING';
    public const MULTIPOLYGON = 'MULTIPOLYGON';
    public const GEOMETRYCOLLECTION = 'GEOMETRYCOLLECTION';
    public const JSON = 'JSON';

    /**
     * Element information
     */
    protected string $name;
    protected string $type;
    protected int $length;
    protected int $length2;
    protected string $sets;
    protected bool $signed;
    protected bool $nullable;
    protected bool $zerofill;
    protected string $standard;
    protected string $on_update;
    protected string $comment;
    protected string $collation;
    protected string $expression;
    protected string $virtuality;

    /**
     * Collations
     */
    public const armscii8_bin = 'armscii8_bin';
    public const armscii8_general_ci = 'armscii8_general_ci';
    public const armscii8_general_nopad_ci = 'armscii8_general_nopad_ci';
    public const armscii8_nopad_bin = 'armscii8_nopad_bin';
    public const ascii_bin = 'ascii_bin';
    public const ascii_general_ci = 'ascii_general_ci';
    public const ascii_general_nopad_ci = 'ascii_general_nopad_ci';
    public const ascii_nopad_bin = 'ascii_nopad_bin';
    public const big5_bin = 'big5_bin';
    public const big5_chinese_ci = 'big5_chinese_ci';
    public const big5_chinese_nopad_ci = 'big5_chinese_nopad_ci';
    public const big5_nopad_bin = 'big5_nopad_bin';
    public const binary = 'binary';
    public const cp1250_bin = 'cp1250_bin';
    public const cp1250_croatian_ci = 'cp1250_croatian_ci';
    public const cp1250_czech_cs = 'cp1250_czech_cs';
    public const cp1250_general_ci = 'cp1250_general_ci';
    public const cp1250_general_nopad_ci = 'cp1250_general_nopad_ci';
    public const cp1250_nopad_bin = 'cp1250_nopad_bin';
    public const cp1250_polish_ci = 'cp1250_polish_ci';
    public const cp1251_bin = 'cp1251_bin';
    public const cp1251_bulgarian_ci = 'cp1251_bulgarian_ci';
    public const cp1251_general_ci = 'cp1251_general_ci';
    public const cp1251_general_cs = 'cp1251_general_cs';
    public const cp1251_general_nopad_ci = 'cp1251_general_nopad_ci';
    public const cp1251_nopad_bin = 'cp1251_nopad_bin';
    public const cp1251_ukrainian_ci = 'cp1251_ukrainian_ci';
    public const cp1256_bin = 'cp1256_bin';
    public const cp1256_general_ci = 'cp1256_general_ci';
    public const cp1256_general_nopad_ci = 'cp1256_general_nopad_ci';
    public const cp1256_nopad_bin = 'cp1256_nopad_bin';
    public const cp1257_bin = 'cp1257_bin';
    public const cp1257_general_ci = 'cp1257_general_ci';
    public const cp1257_general_nopad_ci = 'cp1257_general_nopad_ci';
    public const cp1257_lithuanian_ci = 'cp1257_lithuanian_ci';
    public const cp1257_nopad_bin = 'cp1257_nopad_bin';
    public const cp850_bin = 'cp850_bin';
    public const cp850_general_ci = 'cp850_general_ci';
    public const cp850_general_nopad_ci = 'cp850_general_nopad_ci';
    public const cp850_nopad_bin = 'cp850_nopad_bin';
    public const cp852_bin = 'cp852_bin';
    public const cp852_general_ci = 'cp852_general_ci';
    public const cp852_general_nopad_ci = 'cp852_general_nopad_ci';
    public const cp852_nopad_bin = 'cp852_nopad_bin';
    public const cp866_bin = 'cp866_bin';
    public const cp866_general_ci = 'cp866_general_ci';
    public const cp866_general_nopad_ci = 'cp866_general_nopad_ci';
    public const cp866_nopad_bin = 'cp866_nopad_bin';
    public const cp932_bin = 'cp932_bin';
    public const cp932_japanese_ci = 'cp932_japanese_ci';
    public const cp932_japanese_nopad_ci = 'cp932_japanese_nopad_ci';
    public const cp932_nopad_bin = 'cp932_nopad_bin';
    public const dec8_bin = 'dec8_bin';
    public const dec8_nopad_bin = 'dec8_nopad_bin';
    public const dec8_swedish_ci = 'dec8_swedish_ci';
    public const dec8_swedish_nopad_ci = 'dec8_swedish_nopad_ci';
    public const eucjpms_bin = 'eucjpms_bin';
    public const eucjpms_japanese_ci = 'eucjpms_japanese_ci';
    public const eucjpms_japanese_nopad_ci = 'eucjpms_japanese_nopad_ci';
    public const eucjpms_nopad_bin = 'eucjpms_nopad_bin';
    public const euckr_bin = 'euckr_bin';
    public const euckr_korean_ci = 'euckr_korean_ci';
    public const euckr_korean_nopad_ci = 'euckr_korean_nopad_ci';
    public const euckr_nopad_bin = 'euckr_nopad_bin';
    public const gb2312_bin = 'gb2312_bin';
    public const gb2312_chinese_ci = 'gb2312_chinese_ci';
    public const gb2312_chinese_nopad_ci = 'gb2312_chinese_nopad_ci';
    public const gb2312_nopad_bin = 'gb2312_nopad_bin';
    public const gbk_bin = 'gbk_bin';
    public const gbk_chinese_ci = 'gbk_chinese_ci';
    public const gbk_chinese_nopad_ci = 'gbk_chinese_nopad_ci';
    public const gbk_nopad_bin = 'gbk_nopad_bin';
    public const geostd8_bin = 'geostd8_bin';
    public const geostd8_general_ci = 'geostd8_general_ci';
    public const geostd8_general_nopad_ci = 'geostd8_general_nopad_ci';
    public const geostd8_nopad_bin = 'geostd8_nopad_bin';
    public const greek_bin = 'greek_bin';
    public const greek_general_ci = 'greek_general_ci';
    public const greek_general_nopad_ci = 'greek_general_nopad_ci';
    public const greek_nopad_bin = 'greek_nopad_bin';
    public const hebrew_bin = 'hebrew_bin';
    public const hebrew_general_ci = 'hebrew_general_ci';
    public const hebrew_general_nopad_ci = 'hebrew_general_nopad_ci';
    public const hebrew_nopad_bin = 'hebrew_nopad_bin';
    public const hp8_bin = 'hp8_bin';
    public const hp8_english_ci = 'hp8_english_ci';
    public const hp8_english_nopad_ci = 'hp8_english_nopad_ci';
    public const hp8_nopad_bin = 'hp8_nopad_bin';
    public const keybcs2_bin = 'keybcs2_bin';
    public const keybcs2_general_ci = 'keybcs2_general_ci';
    public const keybcs2_general_nopad_ci = 'keybcs2_general_nopad_ci';
    public const keybcs2_nopad_bin = 'keybcs2_nopad_bin';
    public const koi8r_bin = 'koi8r_bin';
    public const koi8r_general_ci = 'koi8r_general_ci';
    public const koi8r_general_nopad_ci = 'koi8r_general_nopad_ci';
    public const koi8r_nopad_bin = 'koi8r_nopad_bin';
    public const koi8u_bin = 'koi8u_bin';
    public const koi8u_general_ci = 'koi8u_general_ci';
    public const koi8u_general_nopad_ci = 'koi8u_general_nopad_ci';
    public const koi8u_nopad_bin = 'koi8u_nopad_bin';
    public const latin1_bin = 'latin1_bin';
    public const latin1_danish_ci = 'latin1_danish_ci';
    public const latin1_general_ci = 'latin1_general_ci';
    public const latin1_general_cs = 'latin1_general_cs';
    public const latin1_german1_ci = 'latin1_german1_ci';
    public const latin1_german2_ci = 'latin1_german2_ci';
    public const latin1_nopad_bin = 'latin1_nopad_bin';
    public const latin1_spanish_ci = 'latin1_spanish_ci';
    public const latin1_swedish_ci = 'latin1_swedish_ci';
    public const latin1_swedish_nopad_ci = 'latin1_swedish_nopad_ci';
    public const latin2_bin = 'latin2_bin';
    public const latin2_croatian_ci = 'latin2_croatian_ci';
    public const latin2_czech_cs = 'latin2_czech_cs';
    public const latin2_general_ci = 'latin2_general_ci';
    public const latin2_general_nopad_ci = 'latin2_general_nopad_ci';
    public const latin2_hungarian_ci = 'latin2_hungarian_ci';
    public const latin2_nopad_bin = 'latin2_nopad_bin';
    public const latin5_bin = 'latin5_bin';
    public const latin5_nopad_bin = 'latin5_nopad_bin';
    public const latin5_turkish_ci = 'latin5_turkish_ci';
    public const latin5_turkish_nopad_ci = 'latin5_turkish_nopad_ci';
    public const latin7_bin = 'latin7_bin';
    public const latin7_estonian_cs = 'latin7_estonian_cs';
    public const latin7_general_ci = 'latin7_general_ci';
    public const latin7_general_cs = 'latin7_general_cs';
    public const latin7_general_nopad_ci = 'latin7_general_nopad_ci';
    public const latin7_nopad_bin = 'latin7_nopad_bin';
    public const macce_bin = 'macce_bin';
    public const macce_general_ci = 'macce_general_ci';
    public const macce_general_nopad_ci = 'macce_general_nopad_ci';
    public const macce_nopad_bin = 'macce_nopad_bin';
    public const macroman_bin = 'macroman_bin';
    public const macroman_general_ci = 'macroman_general_ci';
    public const macroman_general_nopad_ci = 'macroman_general_nopad_ci';
    public const macroman_nopad_bin = 'macroman_nopad_bin';
    public const sjis_bin = 'sjis_bin';
    public const sjis_japanese_ci = 'sjis_japanese_ci';
    public const sjis_japanese_nopad_ci = 'sjis_japanese_nopad_ci';
    public const sjis_nopad_bin = 'sjis_nopad_bin';
    public const swe7_bin = 'swe7_bin';
    public const swe7_nopad_bin = 'swe7_nopad_bin';
    public const swe7_swedish_ci = 'swe7_swedish_ci';
    public const swe7_swedish_nopad_ci = 'swe7_swedish_nopad_ci';
    public const tis620_bin = 'tis620_bin';
    public const tis620_nopad_bin = 'tis620_nopad_bin';
    public const tis620_thai_ci = 'tis620_thai_ci';
    public const tis620_thai_nopad_ci= 'tis620_thai_nopad_ci';
    public const ucs2_bin = 'ucs2_bin';
    public const ucs2_croatian_ci = 'ucs2_croatian_ci';
    public const ucs2_croatian_mysql561_ci = 'ucs2_croatian_mysql561_ci';
    public const ucs2_czech_ci = 'ucs2_czech_ci';
    public const ucs2_danish_ci= 'ucs2_danish_ci';
    public const ucs2_esperanto_ci = 'ucs2_esperanto_ci';
    public const ucs2_estonian_ci = 'ucs2_estonian_ci';
    public const ucs2_general_ci = 'ucs2_general_ci';
    public const ucs2_general_mysql500_ci = 'ucs2_general_mysql500_ci';
    public const ucs2_general_nopad_ci = 'ucs2_general_nopad_ci';
    public const ucs2_german2_ci = 'ucs2_german2_ci';
    public const ucs2_hungarian_ci = 'ucs2_hungarian_ci';
    public const ucs2_icelandic_ci = 'ucs2_icelandic_ci';
    public const ucs2_latvian_ci = 'ucs2_latvian_ci';
    public const ucs2_lithuanian_ci = 'ucs2_lithuanian_ci';
    public const ucs2_myanmar_ci = 'ucs2_myanmar_ci';
    public const ucs2_nopad_bin = 'ucs2_nopad_bin';
    public const ucs2_persian_ci = 'ucs2_persian_ci';
    public const ucs2_polish_ci = 'ucs2_polish_ci';
    public const ucs2_roman_ci = 'ucs2_roman_ci';
    public const ucs2_romanian_ci = 'ucs2_romanian_ci';
    public const ucs2_sinhala_ci = 'ucs2_sinhala_ci';
    public const ucs2_slovak_ci = 'ucs2_slovak_ci';
    public const ucs2_slovenian_ci = 'ucs2_slovenian_ci';
    public const ucs2_spanish2_ci = 'ucs2_spanish2_ci';
    public const ucs2_spanish_ci = 'ucs2_spanish_ci';
    public const ucs2_swedish_ci = 'ucs2_swedish_ci';
    public const ucs2_thai_520_w2 = 'ucs2_thai_520_w2';
    public const ucs2_turkish_ci = 'ucs2_turkish_ci';
    public const ucs2_unicode_520_ci = 'ucs2_unicode_520_ci';
    public const ucs2_unicode_520_nopad_ci = 'ucs2_unicode_520_nopad_ci';
    public const ucs2_unicode_ci = 'ucs2_unicode_ci';
    public const ucs2_unicode_nopad_ci = 'ucs2_unicode_nopad_ci';
    public const ucs2_vietnamese_ci = 'ucs2_vietnamese_ci';
    public const ujis_bin = 'ujis_bin';
    public const ujis_japanese_ci = 'ujis_japanese_ci';
    public const ujis_japanese_nopad_ci = 'ujis_japanese_nopad_ci';
    public const ujis_nopad_bin = 'ujis_nopad_bin';
    public const utf16_bin = 'utf16_bin';
    public const utf16_croatian_ci = 'utf16_croatian_ci';
    public const utf16_croatian_mysql561_ci = 'utf16_croatian_mysql561_ci';
    public const utf16_czech_ci = 'utf16_czech_ci';
    public const utf16_danish_ci = 'utf16_danish_ci';
    public const utf16_esperanto_ci = 'utf16_esperanto_ci';
    public const utf16_estonian_ci = 'utf16_estonian_ci';
    public const utf16_general_ci = 'utf16_general_ci';
    public const utf16_general_nopad_ci= 'utf16_general_nopad_ci';
    public const utf16_german2_ci = 'utf16_german2_ci';
    public const utf16_hungarian_ci = 'utf16_hungarian_ci';
    public const utf16_icelandic_ci = 'utf16_icelandic_ci';
    public const utf16_latvian_ci = 'utf16_latvian_ci';
    public const utf16_lithuanian_ci = 'utf16_lithuanian_ci';
    public const utf16_myanmar_ci = 'utf16_myanmar_ci';
    public const utf16_nopad_bin = 'utf16_nopad_bin';
    public const utf16_persian_ci = 'utf16_persian_ci';
    public const utf16_polish_ci = 'utf16_polish_ci';
    public const utf16_roman_ci = 'utf16_roman_ci';
    public const utf16_romanian_ci = 'utf16_romanian_ci';
    public const utf16_sinhala_ci = 'utf16_sinhala_ci';
    public const utf16_slovak_ci = 'utf16_slovak_ci';
    public const utf16_slovenian_ci = 'utf16_slovenian_ci';
    public const utf16_spanish2_ci = 'utf16_spanish2_ci';
    public const utf16_spanish_ci = 'utf16_spanish_ci';
    public const utf16_swedish_ci = 'utf16_swedish_ci';
    public const utf16_thai_520_w2 = 'utf16_thai_520_w2';
    public const utf16_turkish_ci = 'utf16_turkish_ci';
    public const utf16_unicode_520_ci = 'utf16_unicode_520_ci';
    public const utf16_unicode_520_nopad_ci = 'utf16_unicode_520_nopad_ci';
    public const utf16_unicode_ci = 'utf16_unicode_ci';
    public const utf16_unicode_nopad_ci = 'utf16_unicode_nopad_ci';
    public const utf16_vietnamese_ci = 'utf16_vietnamese_ci';
    public const utf16le_bin = 'utf16le_bin';
    public const utf16le_general_ci = 'utf16le_general_ci';
    public const utf16le_general_nopad_ci = 'utf16le_general_nopad_ci';
    public const utf16le_nopad_bin = 'utf16le_nopad_bin';
    public const utf32_bin = 'utf32_bin';
    public const utf32_croatian_ci = 'utf32_croatian_ci';
    public const utf32_croatian_mysql561_ci = 'utf32_croatian_mysql561_ci';
    public const utf32_czech_ci = 'utf32_czech_ci';
    public const utf32_danish_ci = 'utf32_danish_ci';
    public const utf32_esperanto_ci = 'utf32_esperanto_ci';
    public const utf32_estonian_ci = 'utf32_estonian_ci';
    public const utf32_general_ci = 'utf32_general_ci';
    public const utf32_general_nopad_ci = 'utf32_general_nopad_ci';
    public const utf32_german2_ci= 'utf32_german2_ci';
    public const utf32_hungarian_ci = 'utf32_hungarian_ci';
    public const utf32_icelandic_ci = 'utf32_icelandic_ci';
    public const utf32_latvian_ci = 'utf32_latvian_ci';
    public const utf32_lithuanian_ci = 'utf32_lithuanian_ci';
    public const utf32_myanmar_ci = 'utf32_myanmar_ci';
    public const utf32_nopad_bin = 'utf32_nopad_bin';
    public const utf32_persian_ci = 'utf32_persian_ci';
    public const utf32_polish_ci = 'utf32_polish_ci';
    public const utf32_roman_ci = 'utf32_roman_ci';
    public const utf32_romanian_ci = 'utf32_romanian_ci';
    public const utf32_sinhala_ci = 'utf32_sinhala_ci';
    public const utf32_slovak_ci = 'utf32_slovak_ci';
    public const utf32_slovenian_ci = 'utf32_slovenian_ci';
    public const utf32_spanish2_ci = 'utf32_spanish2_ci';
    public const utf32_spanish_ci = 'utf32_spanish_ci';
    public const utf32_swedish_ci = 'utf32_swedish_ci';
    public const utf32_thai_520_w2 = 'utf32_thai_520_w2';
    public const utf32_turkish_ci = 'utf32_turkish_ci';
    public const utf32_unicode_520_ci = 'utf32_unicode_520_ci';
    public const utf32_unicode_520_nopad_ci = 'utf32_unicode_520_nopad_ci';
    public const utf32_unicode_ci = 'utf32_unicode_ci';
    public const utf32_unicode_nopad_ci = 'utf32_unicode_nopad_ci';
    public const utf32_vietnamese_ci = 'utf32_vietnamese_ci';
    public const utf8_bin = 'utf8_bin';
    public const utf8_croatian_ci = 'utf8_croatian_ci';
    public const utf8_croatian_mysql561_ci = 'utf8_croatian_mysql561_ci';
    public const utf8_czech_ci = 'utf8_czech_ci';
    public const utf8_danish_ci = 'utf8_danish_ci';
    public const utf8_esperanto_ci = 'utf8_esperanto_ci';
    public const utf8_estonian_ci = 'utf8_estonian_ci';
    public const utf8_general_ci = 'utf8_general_ci';
    public const utf8_general_mysql500_ci = 'utf8_general_mysql500_ci';
    public const utf8_general_nopad_ci = 'utf8_general_nopad_ci';
    public const utf8_german2_ci = 'utf8_german2_ci';
    public const utf8_hungarian_ci = 'utf8_hungarian_ci';
    public const utf8_icelandic_ci = 'utf8_icelandic_ci';
    public const utf8_latvian_ci = 'utf8_latvian_ci';
    public const utf8_lithuanian_ci = 'utf8_lithuanian_ci';
    public const utf8_myanmar_ci = 'utf8_myanmar_ci';
    public const utf8_nopad_bin = 'utf8_nopad_bin';
    public const utf8_persian_ci = 'utf8_persian_ci';
    public const utf8_polish_ci = 'utf8_polish_ci';
    public const utf8_roman_ci = 'utf8_roman_ci';
    public const utf8_romanian_ci = 'utf8_romanian_ci';
    public const utf8_sinhala_ci = 'utf8_sinhala_ci';
    public const utf8_slovak_ci = 'utf8_slovak_ci';
    public const utf8_slovenian_ci = 'utf8_slovenian_ci';
    public const utf8_spanish2_ci = 'utf8_spanish2_ci';
    public const utf8_spanish_ci = 'utf8_spanish_ci';
    public const utf8_swedish_ci = 'utf8_swedish_ci';
    public const utf8_thai_520_w2 = 'utf8_thai_520_w2';
    public const utf8_turkish_ci = 'utf8_turkish_ci';
    public const utf8_unicode_520_ci = 'utf8_unicode_520_ci';
    public const utf8_unicode_520_nopad_ci = 'utf8_unicode_520_nopad_ci';
    public const utf8_unicode_ci = 'utf8_unicode_ci';
    public const utf8_unicode_nopad_ci = 'utf8_unicode_nopad_ci';
    public const utf8_vietnamese_ci = 'utf8_vietnamese_ci';
    public const utf8mb4_bin = 'utf8mb4_bin';
    public const utf8mb4_croatian_ci = 'utf8mb4_croatian_ci';
    public const utf8mb4_croatian_mysql561_ci = 'utf8mb4_croatian_mysql561_ci';
    public const utf8mb4_czech_ci = 'utf8mb4_czech_ci';
    public const utf8mb4_danish_ci = 'utf8mb4_danish_ci';
    public const utf8mb4_esperanto_ci = 'utf8mb4_esperanto_ci';
    public const utf8mb4_estonian_ci = 'utf8mb4_estonian_ci';
    public const utf8mb4_general_ci = 'utf8mb4_general_ci';
    public const utf8mb4_general_nopad_ci = 'utf8mb4_general_nopad_ci';
    public const utf8mb4_german2_ci = 'utf8mb4_german2_ci';
    public const utf8mb4_hungarian_ci = 'utf8mb4_hungarian_ci';
    public const utf8mb4_icelandic_ci = 'utf8mb4_icelandic_ci';
    public const utf8mb4_latvian_ci = 'utf8mb4_latvian_ci';
    public const utf8mb4_lithuanian_ci = 'utf8mb4_lithuanian_ci';
    public const utf8mb4_myanmar_ci = 'utf8mb4_myanmar_ci';
    public const utf8mb4_nopad_bin = 'utf8mb4_nopad_bin';
    public const utf8mb4_persian_ci = 'utf8mb4_persian_ci';
    public const utf8mb4_polish_ci = 'utf8mb4_polish_ci';
    public const utf8mb4_roman_ci = 'utf8mb4_roman_ci';
    public const utf8mb4_romanian_ci = 'utf8mb4_romanian_ci';
    public const utf8mb4_sinhala_ci = 'utf8mb4_sinhala_ci';
    public const utf8mb4_slovak_ci = 'utf8mb4_slovak_ci';
    public const utf8mb4_slovenian_ci = 'utf8mb4_slovenian_ci';
    public const utf8mb4_spanish2_ci = 'utf8mb4_spanish2_ci';
    public const utf8mb4_spanish_ci = 'utf8mb4_spanish_ci';
    public const utf8mb4_swedish_ci = 'utf8mb4_swedish_ci';
    public const utf8mb4_thai_520_w2 = 'utf8mb4_thai_520_w2';
    public const utf8mb4_turkish_ci = 'utf8mb4_turkish_ci';
    public const utf8mb4_unicode_520_ci = 'utf8mb4_unicode_520_ci';
    public const utf8mb4_unicode_520_nopad_ci = 'utf8mb4_unicode_520_nopad_ci';
    public const utf8mb4_unicode_ci = 'utf8mb4_unicode_ci';
    public const utf8mb4_unicode_nopad_ci = 'utf8mb4_unicode_nopad_ci';
    public const utf8mb4_vietnamese_ci = 'utf8mb4_vietnamese_ci';

    /**
     * Virtuality
     */
    public const VIRTUAL = 'VIRTUAL';
    public const PERSISTENT = 'PERSISTENT';
    public const STORED = 'STORED';

    /**
     * valeur de l'element
     */
    private mixed $valeur;
    /**
     * OW_Base_Db_Element constructor.
     * @param string $name
     */
    public function __construct(string $name)
    {
        $this->name = $name;
        $this->type = OW_Db_Element::VARCHAR;
        $this->length = 255;
        $this->length2 = 0;
        $this->sets = '';
        $this->signed = false;
        $this->nullable = false;
        $this->zerofill = false;
        $this->standard = '';
        $this->on_update = '';
        $this->comment = '';
        $this->collation = OW_Db_Element::utf8mb4_general_ci;
        $this->expression = '';
        $this->virtuality = '';
        /**
         * par defaut du type varchar
         */
        $this->setVarcharType(true);
    }

    /**
     * le type de l'element dans la base de données
     *
     * @param string $type
     * @return OW_Base_Db_Element
     */
    public function type(string $type): OW_Base_Db_Element
    {
        defined('self::'.strtoupper($type)) or debug("The type ".$type."  does not exist !", true);
        $this->type = strtoupper($type);

        /**
         * Number type
         */
        if (in_array(strtoupper($type), array(OW_Db_Element::TINYINT,
                                              OW_Db_Element::SMALLINT,
                                              OW_Db_Element::MEDIUMINT,
                                              OW_Db_Element::INT,
                                              OW_Db_Element::BIGINT,
                                              OW_Db_Element::DECIMAL,
                                              OW_Db_Element::FLOAT,
                                              OW_Db_Element::DOUBLE,
                                              OW_Db_Element::BIT,
                                              OW_Db_Element::BOOLEAN,
                                              OW_Db_Element::REAL,
                                              OW_Db_Element::SERIAL))
        ) {
            $this->setNumberType(true);
        }

        /**
         * Date type
         */
        if (in_array(strtoupper($type), array(OW_Db_Element::DATE,
                                              OW_Db_Element::DATETIME,
                                              OW_Db_Element::TIMESTAMP,
                                              OW_Db_Element::TIME,
                                              OW_Db_Element::YEAR))
        ) {
            $this->setDateType(true);
        }

        /**
         * Varchar type
         */
        if (in_array(strtoupper($type), array(OW_Db_Element::CHAR,
                                              OW_Db_Element::VARCHAR,
                                              OW_Db_Element::TINYTEXT,
                                              OW_Db_Element::TEXT,
                                              OW_Db_Element::MEDIUMTEXT,
                                              OW_Db_Element::LONGTEXT,
                                              OW_Db_Element::BINARY,
                                              OW_Db_Element::VARBINARY,
                                              OW_Db_Element::TINYBLOB,
                                              OW_Db_Element::BLOB,
                                              OW_Db_Element::MEDIUMBLOB,
                                              OW_Db_Element::LONGBLOB,
                                              OW_Db_Element::ENUM,
                                              OW_Db_Element::SET))
        ) {
            $this->setVarcharType(true);
        }

        /**
         * Espace type
         */
        if (in_array(strtoupper($type), array(OW_Db_Element::GEOMETRY,
                                              OW_Db_Element::POINT,
                                              OW_Db_Element::LINESTRING,
                                              OW_Db_Element::POLYGON,
                                              OW_Db_Element::MULTIPOINT,
                                              OW_Db_Element::MULTILINESTRING,
                                              OW_Db_Element::MULTIPOLYGON,
                                              OW_Db_Element::GEOMETRYCOLLECTION,
                                              OW_Db_Element::JSON))
        ) {
            $this->setEspaceType(true);
        }

        return $this;
    }

    /**
     * @param int $length
     * @param int $length2
     * @return OW_Base_Db_Element
     */
    public function length(int $length, int $length2 = 0): OW_Base_Db_Element
    {
        $this->length = $length;
        $this->length2 = $length2;
        return $this;
    }

    /**
     *
     * Liste des valeurs pour les enums
     *
     * @param string $sets
     * @return OW_Base_Db_Element
     */
    public function sets(string $sets): OW_Base_Db_Element
    {
        $this->sets = $sets;
        return $this;
    }

    /**
     * True ou false pour les element signé
     *
     * @param bool $signed
     * @return OW_Base_Db_Element
     */
    public function signed(bool $signed): OW_Base_Db_Element
    {
        $this->signed = $signed;
        return $this;
    }

    /**
     * Accepte la valeur null
     *
     * @param bool $nullable
     * @return OW_Base_Db_Element
     */
    public function nullable(bool $nullable): OW_Base_Db_Element
    {
        $this->nullable = $nullable;
        return $this;
    }

    /**
     * @param bool $zerofill
     * @return OW_Base_Db_Element
     */
    public function zerofill(bool $zerofill): OW_Base_Db_Element
    {
        $this->zerofill = $zerofill;
        return $this;
    }

    /**
     * Valeur standart, ou alors une function ou tout autre chose
     *
     * @param string $standard
     * @return OW_Base_Db_Element
     */
    public function standard(string $standard): OW_Base_Db_Element
    {
        /**
         * Verifier les standarads possibles avant
         * AUTO INC
         * NULL
         * FUNCTION
         * TEXT
         * ....
         */
        if ($standard == "AUTO_INCREMENT") {

            $this->standard = $standard;

        } else {

            if (is_numeric($standard) || strpos( $standard, "(") !== false) {

                $this->standard = " DEFAULT ". $standard;

            } else {

                $this->standard = " DEFAULT '". $standard ."'";

            }

        }

        return $this;
    }

    /**
     * A faire lors d'un update
     *
     * @param string $on_update
     * @return OW_Base_Db_Element
     */
    public function on_update(string $on_update): OW_Base_Db_Element
    {
        $this->on_update = $on_update;
        return $this;
    }

    /**
     * Comment
     *
     * @param string $comment
     * @return OW_Base_Db_Element
     */
    public function comment(string $comment): OW_Base_Db_Element
    {
        $this->comment = $comment;
        return $this;
    }

    /**
     *
     * Collation
     *
     * @param string $collation
     * @return OW_Base_Db_Element
     */
    public function collation(string $collation): OW_Base_Db_Element
    {
        defined('self::'.strtolower($collation)) or debug("The Collation  ".strtolower($collation)."  does not exist !", true);
        $this->collation = strtolower($collation);
        return $this;
    }

    /**
     *
     * Expression
     *
     * @param string $expression
     * @return OW_Base_Db_Element
     */
    public function expression(string $expression): OW_Base_Db_Element
    {
        $this->expression = $expression;
        return $this;
    }

    /**
     * Virtualité de l'element
     *
     * @param string $virtuality
     * @return OW_Base_Db_Element
     */
    public function virtuality(string $virtuality): OW_Base_Db_Element
    {
        defined('self::'.strtoupper($virtuality)) or debug("The Virtuality  ".$virtuality."  does not exist !", true);
        $this->virtuality = strtoupper($virtuality);
        return $this;
    }

    /**
     * @return bool
     */
    public function isNumberType(): bool
    {
        return $this->numberType;
    }

    /**
     * @return bool
     */
    public function isDateType(): bool
    {
        return $this->dateType;
    }

    /**
     * @return bool
     */
    public function isVarcharType(): bool
    {
        return $this->varcharType;
    }

    /**
     * @return bool
     */
    public function isEspaceType(): bool
    {
        return $this->espaceType;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @return string
     */
    public function getType(): string
    {
        return $this->type;
    }

    /**
     * @return int
     */
    public function getLength(): int
    {
        return $this->length;
    }

    /**
     * @return string
     */
    public function getSets(): string
    {
        return $this->sets;
    }

    /**
     * @return bool
     */
    public function isSigned(): bool
    {
        return $this->signed;
    }

    /**
     * @return bool
     */
    public function isNullable(): bool
    {
        return $this->nullable;
    }

    /**
     * @return bool
     */
    public function isZerofill(): bool
    {
        return $this->zerofill;
    }

    /**
     * @return string
     */
    public function getStandard(): string
    {
        return $this->standard;
    }

    /**
     * @return string
     */
    public function getOnUpdate(): string
    {
        return $this->on_update;
    }

    /**
     * @return string
     */
    public function getComment(): string
    {
        return $this->comment;
    }

    /**
     * @return string
     */
    public function getCollation(): string
    {
        return $this->collation;
    }

    /**
     * @return string
     */
    public function getExpression(): string
    {
        return $this->expression;
    }

    /**
     * @return string
     */
    public function getVirtuality(): string
    {
        return $this->virtuality;
    }

    /**
     * @param bool $numberType
     */
    public function setNumberType(bool $numberType): void
    {
        $this->numberType = $numberType;

        /**
         * validation d'un seule type d'element
         */
        if ($numberType == true) {

            $this->setEspaceType(false);
            $this->setVarcharType(false);
            $this->setDateType(false);

        }
    }

    /**
     * @param bool $dateType
     */
    public function setDateType(bool $dateType): void
    {
        $this->dateType = $dateType;
        /**
         * validation d'un seule type d'element
         */
        if ($dateType == true) {

            $this->setEspaceType(false);
            $this->setVarcharType(false);
            $this->setNumberType(false);

        }
    }

    /**
     * @param bool $varcharType
     */
    public function setVarcharType(bool $varcharType): void
    {
        $this->varcharType = $varcharType;
        /**
         * validation d'un seule type d'element
         */
        if ($varcharType == true) {

            $this->setDateType(false);
            $this->setEspaceType(false);
            $this->setNumberType(false);
        }
    }

    /**
     * @param bool $espaceType
     */
    public function setEspaceType(bool $espaceType): void
    {
        $this->espaceType = $espaceType;
        /**
         * validation d'un seule type d'element
         */
        if ($espaceType == true) {

            $this->setDateType(false);
            $this->setVarcharType(false);
            $this->setNumberType(false);

        }
    }

    /**
     * @return mixed
     */
    public function getValeur()
    {
        return $this->valeur;
    }

    /**
     * @param mixed $valeur
     */
    public function setValeur($valeur): void
    {
        $this->valeur = $valeur;
    }


    /**
     * Retourne la query necessaire pour creer une colonne cet element dans la table de la BD
     *
     * @param string $preview_column
     * @return string
     */
    public function getAddColumnQuery(string $preview_column = 'id'): string
    {
        /**
         * Getting the name
         */
        $sql = "ADD `". $this->name ."` ";

        /**
         * Getting the type
         */
        $type = $this->type;
        /**
         * Length 0-255 varchar
         * 0-11 Int
         * 0-11, 0-11 Virgule floatante
         */
        if ($this->isNumberType() || $this->isVarcharType()){

            if (!in_array($this->type, array(OW_Db_Element::BIT, OW_Db_Element::SERIAL))) {

                $type .= "(". $this->length . ( ($this->length2 != 0) ? ",".$this->length2 : "" ) .")";

            }

        }

        $sql .= $type;

        /**
         * Getting the signe type for number
         */
        if ($this->isNumberType() && $this->isSigned()) {

            $sql .= " UNSIGNED";

        }

        /**
         * Getting nullable
         */

        if ($this->isNullable()) {

            $sql .= " NULL";

        } else {

            $sql .= " NOT NULL";

        }

        /**
         * Getting Standard
         */
        $sql .= " ". $this->standard;

        /**
         * Getting un update
         */

        if (!empty($this->on_update)) {

            $sql .= " ON UPDATE ". $this->on_update;

        }

        /**
         * Comment
         */

        $sql .= " COMMENT '". $this->comment ."'";

        /**
         * COLLATE
         */

        $sql .= " COLLATE '". $this->collation ."'";

        /**
         * Position
         */

        if ($this->name === "id") {

            $sql .= " FIRST";

        } else {

            $sql .= " AFTER `". $preview_column ."`";

        }

        return $sql;
    }
}