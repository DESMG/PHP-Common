<?php

namespace DESMG\ISO3166\Alpha2;

readonly class CountryCodes
{
    /** @var string[] */
    const array ISO_3166_1_ALPHA_2 = [
        'AC', 'AD', 'AE', 'AF', 'AG', 'AI', 'AL', 'AM', 'AO', 'AQ', 'AR', 'AS', 'AT', 'AU', 'AW', 'AX', 'AZ',
        'BA', 'BB', 'BD', 'BE', 'BF', 'BG', 'BH', 'BI', 'BJ', 'BL', 'BM', 'BN', 'BO', 'BQ', 'BR', 'BS', 'BT', 'BV', 'BW', 'BY', 'BZ',
        'CA', 'CC', 'CD', 'CF', 'CG', 'CH', 'CI', 'CK', 'CL', 'CM', 'CN', 'CO', 'CP', 'CR', 'CU', 'CV', 'CW', 'CX', 'CY', 'CZ',
        'DE', 'DG', 'DJ', 'DK', 'DM', 'DO', 'DZ', 'EA',
        'EC', 'EE', 'EG', 'EH', 'ER', 'ES', 'ET', 'EU',
        'FI', 'FJ', 'FK', 'FM', 'FO', 'FR',
        'GA', 'GB', 'GD', 'GE', 'GF', 'GG', 'GH', 'GI', 'GL', 'GM', 'GN', 'GP', 'GQ', 'GR', 'GS', 'GT', 'GU', 'GW', 'GY',
        'HK', 'HM', 'HN', 'HR', 'HT', 'HU', 'IC',
        'ID', 'IE', 'IL', 'IM', 'IN', 'IO', 'IQ', 'IR', 'IS', 'IT',
        'JE', 'JM', 'JO', 'JP',
        'KE', 'KG', 'KH', 'KI', 'KM', 'KN', 'KP', 'KR', 'KW', 'KY', 'KZ',
        'LA', 'LB', 'LC', 'LI', 'LK', 'LR', 'LS', 'LT', 'LU', 'LV', 'LY',
        'MA', 'MC', 'MD', 'ME', 'MF', 'MG', 'MH', 'MK', 'ML', 'MM', 'MN', 'MO', 'MP', 'MQ', 'MR', 'MS', 'MT', 'MU', 'MV', 'MW', 'MX', 'MY', 'MZ',
        'NA', 'NC', 'NE', 'NF', 'NG', 'NI', 'NL', 'NO', 'NP', 'NR', 'NU', 'NZ',
        'OM',
        'PA', 'PE', 'PF', 'PG', 'PH', 'PK', 'PL', 'PM', 'PN', 'PR', 'PS', 'PT', 'PW', 'PY',
        'QA',
        'RE', 'RO',
        'RS', 'RU', 'RW',
        'SA', 'SB', 'SC', 'SD', 'SE', 'SG', 'SH', 'SI', 'SJ', 'SK', 'SL', 'SM', 'SN', 'SO', 'SR', 'SS', 'ST', 'SV', 'SX', 'SY', 'SZ',
        'TA', 'TC', 'TD', 'TF', 'TG', 'TH', 'TJ', 'TK', 'TL', 'TM', 'TN', 'TO', 'TR', 'TT', 'TV', 'TW', 'TZ',
        'UA', 'UG', 'UM', 'UN', 'US', 'UY', 'UZ',
        'VA', 'VC', 'VE', 'VG', 'VI', 'VN', 'VU',
        'WF', 'WS',
        'XK',
        'YE', 'YT',
        'ZA', 'ZM', 'ZW',
    ];

    /** @var string[] */
    const array UNKNOWN_COUNTRY = [
        'AA', 'AB', 'AH', 'AJ', 'AK', 'AN', 'AP', 'AV', 'AY',
        'BC', 'BK', 'BP', 'BU', 'BX',
        'CB', 'CE', 'CJ', 'CQ', 'CS', 'CT',
        'DA', 'DB', 'DC', 'DD', 'DF', 'DH', 'DI', 'DL', 'DN', 'DP', 'DQ', 'DR', 'DS', 'DT', 'DU', 'DV', 'DW', 'DX', 'DY',
        'EB', 'ED', 'EF', 'EI', 'EJ', 'EK', 'EL', 'EM', 'EN', 'EO', 'EP', 'EQ', 'EV', 'EW', 'EX', 'EY', 'EZ',
        'FA', 'FB', 'FC', 'FD', 'FE', 'FF', 'FG', 'FH', 'FL', 'FN', 'FP', 'FQ', 'FS', 'FT', 'FU', 'FV', 'FW', 'FX', 'FY', 'FZ',
        'GC', 'GJ', 'GK', 'GO', 'GV', 'GX', 'GZ',
        'HA', 'HB', 'HC', 'HD', 'HE', 'HF', 'HG', 'HH', 'HI', 'HJ', 'HL', 'HO', 'HP', 'HQ', 'HS', 'HV', 'HW', 'HX', 'HY', 'HZ',
        'IA', 'IB', 'IF', 'IG', 'IH', 'II', 'IJ', 'IK', 'IP', 'IU', 'IV', 'IW', 'IX', 'IY', 'IZ',
        'JA', 'JB', 'JC', 'JD', 'JF', 'JG', 'JH', 'JI', 'JJ', 'JK', 'JL', 'JN', 'JQ', 'JR', 'JS', 'JT', 'JU', 'JV', 'JW', 'JX', 'JY', 'JZ',
        'KA', 'KB', 'KC', 'KD', 'KF', 'KJ', 'KK', 'KL', 'KO', 'KQ', 'KS', 'KT', 'KU', 'KV', 'KX',
        'LD', 'LE', 'LF', 'LG', 'LH', 'LJ', 'LL', 'LM', 'LN', 'LO', 'LP', 'LQ', 'LW', 'LX', 'LZ',
        'MB', 'MI', 'MJ',
        'NB', 'ND', 'NH', 'NJ', 'NK', 'NM', 'NN', 'NQ', 'NS', 'NT', 'NV', 'NW', 'NX', 'NY',
        'OA', 'OB', 'OC', 'OD', 'OE', 'OF', 'OG', 'OH', 'OI', 'OJ', 'OK', 'OL', 'ON', 'OO', 'OP', 'OQ', 'OR', 'OS', 'OT', 'OU', 'OV', 'OW', 'OX', 'OY', 'OZ',
        'PB', 'PC', 'PD', 'PI', 'PJ', 'PO', 'PP', 'PQ', 'PU', 'PV', 'PX', 'PZ',
        'QB', 'QC', 'QD', 'QE', 'QF', 'QG', 'QH', 'QI', 'QJ', 'QK', 'QL', 'QM', 'QN', 'QO', 'QP', 'QQ', 'QR', 'QS', 'QT', 'QU', 'QV', 'QW', 'QX', 'QY', 'QZ',
        'RA', 'RB', 'RC', 'RD', 'RF', 'RG', 'RH', 'RI', 'RJ', 'RK', 'RL', 'RM', 'RN', 'RP', 'RQ', 'RR', 'RT', 'RV', 'RX', 'RY', 'RZ',
        'SF', 'SP', 'SQ', 'SU', 'SW',
        'TB', 'TE', 'TI', 'TP', 'TQ', 'TS', 'TU', 'TX', 'TY',
        'UB', 'UC', 'UD', 'UE', 'UF', 'UH', 'UI', 'UJ', 'UK', 'UL', 'UO', 'UP', 'UQ', 'UR', 'UT', 'UU', 'UV', 'UW', 'UX',
        'VB', 'VD', 'VF', 'VH', 'VJ', 'VK', 'VL', 'VM', 'VO', 'VP', 'VQ', 'VR', 'VS', 'VT', 'VV', 'VW', 'VX', 'VY', 'VZ',
        'WA', 'WB', 'WC', 'WD', 'WE', 'WG', 'WH', 'WI', 'WJ', 'WK', 'WL', 'WM', 'WN', 'WO', 'WP', 'WQ', 'WR', 'WT', 'WU', 'WV', 'WW', 'WX', 'WY', 'WZ',
        'XA', 'XB', 'XC', 'XD', 'XE', 'XF', 'XG', 'XH', 'XI', 'XJ', 'XL', 'XM', 'XN', 'XO', 'XP', 'XQ', 'XR', 'XS', 'XT', 'XU', 'XV', 'XW', 'XX', 'XY', 'XZ',
        'YA', 'YB', 'YC', 'YD', 'YF', 'YG', 'YH', 'YI', 'YJ', 'YK', 'YL', 'YM', 'YN', 'YO', 'YP', 'YQ', 'YR', 'YS', 'YU', 'YV', 'YW', 'YX', 'YY', 'YZ',
        'ZB', 'ZC', 'ZD', 'ZE', 'ZF', 'ZG', 'ZH', 'ZI', 'ZJ', 'ZK', 'ZL', 'ZN', 'ZO', 'ZP', 'ZQ', 'ZR', 'ZS', 'ZT', 'ZU', 'ZV', 'ZX', 'ZY', 'ZZ',
    ];
}
