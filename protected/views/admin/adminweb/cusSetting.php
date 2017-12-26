<?php if($user->settingOptions==""){ ?>
var customer = {

  "custId": <?php echo $user->Id ?>,
  "userName": "<?php echo $user->username ?>",
  "newUserName": "",
  "password": "",
  "firstName": "",
  "lastName": "",
  "creator": <?php echo $user->parentUser ?>,
  "phone": "",
  "mobilePhone": "",
  "fax": "",
  "transferOption": "01111111",
  "credit": <?php echo $user->credit ?>,
  "minCredit": 0.0,
  "maxCredit": <?php echo $admin->Credit ?>,
  "memberMaxCredit": 0.0,
  "memberMinCredit": 0.0,
  "siteName": "789y",
  "currencyId": 0,
  "group": "a",
  "isInternal": false,
  "sRecommend": 13696269,
  "mRecommend": 0,
  "aRecommend": 0,
  "language": "VI",
  "bettingLimit": {
    "bettingLimitItems": [
      {
        "id": 1,
        "betTypeId": 0,
        "name": "Bóng Đá",
        "key": "Soccer",
        "resourceKey": "Soccer",
        "minBet": 3.0000,
        "maxBet": 5000.0000,
        "maxPerMatch": 20000.0000,
        "minBetMax": 3.0000,
        "maxBetMin": 5000.0000,
        "maxPerMatchMin": 0.0000,
        "maxPerMatchMax": 20000.0000
      },
      {
        "id": 2,
        "betTypeId": 0,
        "name": "Bóng Rổ",
        "key": "Basketball",
        "resourceKey": "Basketball",
        "minBet": 3.0000,
        "maxBet": 1000.0000,
        "maxPerMatch": 2000.0000,
        "minBetMax": 3.0000,
        "maxBetMin": 1000.0000,
        "maxPerMatchMin": 0.0000,
        "maxPerMatchMax": 2000.0000
      },
      {
        "id": 3,
        "betTypeId": 0,
        "name": "Bóng Bầu Dục Mỹ",
        "key": "Football",
        "resourceKey": "Football",
        "minBet": 3.0000,
        "maxBet": 1000.0000,
        "maxPerMatch": 2000.0000,
        "minBetMax": 3.0000,
        "maxBetMin": 1000.0000,
        "maxPerMatchMin": 0.0000,
        "maxPerMatchMax": 2000.0000
      },
      {
        "id": 5,
        "betTypeId": 0,
        "name": "Quần Vợt",
        "key": "Tennis",
        "resourceKey": "Tennis",
        "minBet": 3.0000,
        "maxBet": 1000.0000,
        "maxPerMatch": 2000.0000,
        "minBetMax": 3.0000,
        "maxBetMin": 1000.0000,
        "maxPerMatchMin": 0.0000,
        "maxPerMatchMax": 2000.0000
      },
      {
        "id": 8,
        "betTypeId": 0,
        "name": "Bóng Chày",
        "key": "Baseball",
        "resourceKey": "Baseball",
        "minBet": 3.0000,
        "maxBet": 1000.0000,
        "maxPerMatch": 2000.0000,
        "minBetMax": 3.0000,
        "maxBetMin": 1000.0000,
        "maxPerMatchMin": 0.0000,
        "maxPerMatchMax": 2000.0000
      },
      {
        "id": 10,
        "betTypeId": 0,
        "name": "Đánh Golf",
        "key": "Golf",
        "resourceKey": "Golf",
        "minBet": 3.0000,
        "maxBet": 1000.0000,
        "maxPerMatch": 2000.0000,
        "minBetMax": 3.0000,
        "maxBetMin": 1000.0000,
        "maxPerMatchMin": 0.0000,
        "maxPerMatchMax": 2000.0000
      },
      {
        "id": 11,
        "betTypeId": 0,
        "name": "Thể Thao Môtô",
        "key": "Moto Sports",
        "resourceKey": "MotorSports",
        "minBet": 3.0000,
        "maxBet": 1000.0000,
        "maxPerMatch": 2000.0000,
        "minBetMax": 3.0000,
        "maxBetMin": 1000.0000,
        "maxPerMatchMin": 0.0000,
        "maxPerMatchMax": 2000.0000
      },
      {
        "id": 99,
        "betTypeId": 0,
        "name": "Môn Thể Thao khác",
        "key": "Other Sports",
        "resourceKey": "OtherSports",
        "minBet": 3.0000,
        "maxBet": 1000.0000,
        "maxPerMatch": 2000.0000,
        "minBetMax": 3.0000,
        "maxBetMin": 1000.0000,
        "maxPerMatchMin": 0.0000,
        "maxPerMatchMax": 2000.0000
      },
      {
        "id": 99,
        "betTypeId": 0,
        "name": "Mix Sports Parlay",
        "key": "Mix Sports Parlay",
        "resourceKey": "mixsports",
        "minBet": 3.0000,
        "maxBet": 1000.0000,
        "maxPerMatch": 2000.0000,
        "minBetMax": 3.0000,
        "maxBetMin": 1000.0000,
        "maxPerMatchMin": 0.0000,
        "maxPerMatchMax": 2000.0000
      },
      {
        "id": 154,
        "betTypeId": 0,
        "name": "HR Fixed Odds",
        "key": "HR Fixed Odds",
        "resourceKey": "HRFixedOdds",
        "minBet": 3.0000,
        "maxBet": 1000.0000,
        "maxPerMatch": 2000.0000,
        "minBetMax": 3.0000,
        "maxBetMin": 1000.0000,
        "maxPerMatchMin": 0.0000,
        "maxPerMatchMax": 2000.0000
      },
      {
        "id": 161,
        "betTypeId": 0,
        "name": "Number Game",
        "key": "Number Game",
        "resourceKey": "numbergame",
        "minBet": 3.0000,
        "maxBet": 100.0000,
        "maxPerMatch": 1000.0000,
        "maxPerBall": 1000.0000,
        "minBetMax": 3.0000,
        "maxBetMin": 1000.0000,
        "maxPerMatchMin": 0.0000,
        "maxPerMatchMax": 1000.0000,
        "maxPerBallMax": 1000.0000
      }
    ]
  },
  "statusSetting": {
    "disable151_31": false,
    "disable151_41": false,
    "disable151_51": false,
    "disable152_41": false,
    "disable152_51": false,
    "disable153_51": false,
    "disableFinancial": false,
    "disableCasino": false,
    "syncCasino": true,
    "disableBingo": false,
    "syncBingo": true,
    "disableNumber": false,
    "disableP2P": false,
    "disableFUNP2P": false,
    "disable162_1101": false,
    "isInternal": false,
    "disableAutoMPT": false,
    "suspended": <?php echo ($user->status==3)?"true":"false" ?>,
    "closed": <?php echo ($user->status==2)?"true":"false" ?>,
    "uplineClosed": false,
    "uplineSuspended": false,
    "disableVirtualSports": false,
    "hideVirtualSports": false,
    "disableDownlinesVirtualSports": false,
    "disableUplineVirtualSports": false
  },
  "commissionSetting": {
    "roleId": 1,
    "groupA": 0.00000000,
    "groupB": 0.00000000,
    "groupC": 0.00000000,
    "groupD": 0.00000000,
    "discountCS": 0.01000000,
    "discount1x2": 0.00250000,
    "discountNumber": 0.00000000,
    "discountHRFixedOdds": 0.01000000,
    "groupAMax": 0.00000000,
    "groupBMax": 0.00000000,
    "groupCMax": 0.00000000,
    "groupDMax": 0.00000000,
    "discountCSMax": 0.01000000,
    "discount1x2Max": 0.00250000,
    "discountNumberMax": 0.00000000,
    "discountHRFixedOddsMax": 0.01000000,
    "discount": 0.00250000,
    "playerDiscount": 0.00200000,
    "playerDiscount1x2": 0.00200000,
    "playerDiscountCs": 0.01000000,
    "playerDiscountNumber": 0.00000000,
    "playerDiscountHRFixedOdds": 0.01000000
  },
  "commissionSetting2": {
    "roleId": 0,
    "groupA": 0.0,
    "groupB": 0.0,
    "groupC": 0.0,
    "groupD": 0.0,
    "discountCS": 0.0,
    "discount1x2": 0.0,
    "discountNumber": 0.0,
    "discountHRFixedOdds": 0.0,
    "groupAMax": 0.0,
    "groupBMax": 0.0,
    "groupCMax": 0.0,
    "groupDMax": 0.0,
    "discountCSMax": 0.0,
    "discount1x2Max": 0.0,
    "discountNumberMax": 0.0,
    "discountHRFixedOddsMax": 0.0,
    "discount": 0.0,
    "playerDiscount": 0.0,
    "playerDiscount1x2": 0.0,
    "playerDiscountCs": 0.0,
    "playerDiscountNumber": 0.0,
    "playerDiscountHRFixedOdds": 0.0
  },
  "ptSetting": {
    "name": "ptGrid1",
    "sportTypes": [
      {
        "id": 1,
        "name": "Bóng Đá",
        "key": "Soccer",
        "resourceKey": "Soccer",
        "collapsed": false,
        "betTypeGroupSets": [
          {
            "isLive": false,
            "showGroupSetLabel": true,
            "betTypeGroups": [
              {
                "id": 1,
                "betTypes": [
                  {
                    "id": 1,
                    "name": "Handicap",
                    "title": "Handicap",
                    "resourceKey": "lblHandicapFC",
                    "pt": {
                      "a2": 0.0000,
                      "a1": 0.0000,
                      "n2": 0.0000
                    }
                  },
                  {
                    "id": 3,
                    "name": "Over/Under ",
                    "title": "Over/Under ",
                    "resourceKey": "lblOverUnder",
                    "pt": {
                      "a2": 0.0000,
                      "a1": 0.0000,
                      "n2": 0.0000
                    },
                    "minWidth": 90
                  },
                  {
                    "id": 7,
                    "name": "Hiệp 1 - Hdp",
                    "title": "Hiệp 1 - Hdp",
                    "resourceKey": "lbl1stHdp",
                    "pt": {
                      "a2": 0.0000,
                      "a1": 0.0000,
                      "n2": 0.0000
                    },
                    "minWidth": 97
                  },
                  {
                    "id": 8,
                    "name": "Hiệp 1 - OU",
                    "title": "Hiệp 1 - OU",
                    "resourceKey": "lbl1stOU",
                    "pt": {
                      "a2": 0.0000,
                      "a1": 0.0000,
                      "n2": 0.0000
                    },
                    "minWidth": 90
                  },
                  {
                    "id": 2,
                    "name": "Lẻ/Chẵn",
                    "title": "Lẻ/Chẵn",
                    "resourceKey": "lblOddEven",
                    "pt": {
                      "a2": 0.0000,
                      "a1": 0.0000,
                      "n2": 0.0000
                    },
                    "minWidth": 90
                  },
                  {
                    "id": 9999,
                    "name": "Thể loại khác",
                    "title": "Thể loại khác",
                    "resourceKey": "OtherSport2",
                    "pt": {
                      "a2": 0.0000,
                      "a1": 0.0000,
                      "n2": 0.0000
                    },
                    "minWidth": 90,
                    "showDetailIcon": false,
                    "showBottomBorder": true
                  }
                ]
              },
              {
                "id": 2,
                "betTypes": [
                  {
                    "id": 5,
                    "name": "1 X 2",
                    "title": "1 X 2",
                    "resourceKey": "lbl1x2",
                    "pt": {
                      "a2": 0.0000,
                      "a1": 0.0000,
                      "n2": 0.0000
                    }
                  },
                  {
                    "id": 4,
                    "name": "Correct Score",
                    "title": "Điểm số chính xác",
                    "resourceKey": "correctscore",
                    "pt": {
                      "a2": 0.0000,
                      "a1": 0.0000,
                      "n2": 0.0000
                    },
                    "minWidth": 90
                  },
                  {
                    "id": 6,
                    "name": "Total Goal",
                    "title": "Tổng số bàn thắng",
                    "resourceKey": "totalgoal",
                    "pt": {
                      "a2": 0.0000,
                      "a1": 0.0000,
                      "n2": 0.0000
                    },
                    "minWidth": 97
                  },
                  {
                    "id": 9,
                    "name": "Mix Parlay",
                    "title": "Cá cược tổng hợp",
                    "resourceKey": "lblMixParlay",
                    "pt": {
                      "a2": 0.0000,
                      "a1": 0.0000,
                      "n2": 0.0000
                    },
                    "minWidth": 90
                  },
                  {
                    "id": 10,
                    "name": "Cược Thắng",
                    "title": "Cược Thắng",
                    "resourceKey": "lblOutRight",
                    "pt": {
                      "a2": 0.0000,
                      "a1": 0.0000,
                      "n2": 0.0000
                    },
                    "minWidth": 90,
                    "showRightBorder": true
                  }
                ]
              }
            ]
          },
          {
            "isLive": true,
            "showGroupSetLabel": true,
            "betTypeGroups": [
              {
                "betTypes": [
                  {
                    "id": 1,
                    "name": "Handicap",
                    "title": "Handicap",
                    "resourceKey": "lblHandicapFC",
                    "pt": {
                      "a2": 0.0000,
                      "a1": 0.0000,
                      "n2": 0.0000
                    }
                  },
                  {
                    "id": 3,
                    "name": "Over/Under ",
                    "title": "Over/Under ",
                    "resourceKey": "lblOverUnder",
                    "pt": {
                      "a2": 0.0000,
                      "a1": 0.0000,
                      "n2": 0.0000
                    },
                    "minWidth": 124
                  },
                  {
                    "id": 7,
                    "name": "Hiệp 1 - Hdp",
                    "title": "Hiệp 1 - Hdp",
                    "resourceKey": "lbl1stHdp",
                    "pt": {
                      "a2": 0.0000,
                      "a1": 0.0000,
                      "n2": 0.0000
                    },
                    "minWidth": 124
                  },
                  {
                    "id": 8,
                    "name": "Hiệp 1 - OU",
                    "title": "Hiệp 1 - OU",
                    "resourceKey": "lbl1stOU",
                    "pt": {
                      "a2": 0.0000,
                      "a1": 0.0000,
                      "n2": 0.0000
                    },
                    "minWidth": 124,
                    "showRightBorder": true
                  }
                ]
              }
            ]
          }
        ]
      },
      {
        "id": 2,
        "name": "Bóng Rổ",
        "key": "Basketball",
        "resourceKey": "Basketball",
        "betTypeGroupSets": [
          {
            "isLive": false,
            "betTypeGroups": [
              {
                "betTypes": [
                  {
                    "id": 1,
                    "name": "Handicap",
                    "title": "Handicap",
                    "resourceKey": "lblHandicapFC",
                    "pt": {
                      "a2": 0.0000,
                      "a1": 0.0000,
                      "n2": 0.0000
                    }
                  },
                  {
                    "id": 3,
                    "name": "Over/Under ",
                    "title": "Over/Under ",
                    "resourceKey": "lblOverUnder",
                    "pt": {
                      "a2": 0.0000,
                      "a1": 0.0000,
                      "n2": 0.0000
                    },
                    "minWidth": 90
                  },
                  {
                    "id": 2,
                    "name": "Lẻ/Chẵn",
                    "title": "Lẻ/Chẵn",
                    "resourceKey": "lblOddEven",
                    "pt": {
                      "a2": 0.0000,
                      "a1": 0.0000,
                      "n2": 0.0000
                    }
                  },
                  {
                    "id": 20,
                    "name": "Money Line",
                    "title": "Money Line",
                    "resourceKey": "moneyline",
                    "pt": {
                      "a2": 0.0000,
                      "a1": 0.0000,
                      "n2": 0.0000
                    },
                    "minWidth": 140
                  }
                ]
              }
            ]
          }
        ]
      },
      {
        "id": 3,
        "name": "Bóng Bầu Dục Mỹ",
        "key": "Football",
        "resourceKey": "Football",
        "betTypeGroupSets": [
          {
            "isLive": false,
            "betTypeGroups": [
              {
                "betTypes": [
                  {
                    "id": 1,
                    "name": "Handicap",
                    "title": "Handicap",
                    "resourceKey": "lblHandicapFC",
                    "pt": {
                      "a2": 0.0000,
                      "a1": 0.0000,
                      "n2": 0.0000
                    }
                  },
                  {
                    "id": 3,
                    "name": "Over/Under ",
                    "title": "Over/Under ",
                    "resourceKey": "lblOverUnder",
                    "pt": {
                      "a2": 0.0000,
                      "a1": 0.0000,
                      "n2": 0.0000
                    }
                  },
                  {
                    "id": 2,
                    "name": "Lẻ/Chẵn",
                    "title": "Lẻ/Chẵn",
                    "resourceKey": "lblOddEven",
                    "pt": {
                      "a2": 0.0000,
                      "a1": 0.0000,
                      "n2": 0.0000
                    }
                  },
                  {
                    "id": 20,
                    "name": "Money Line",
                    "title": "Money Line",
                    "resourceKey": "moneyline",
                    "pt": {
                      "a2": 0.0000,
                      "a1": 0.0000,
                      "n2": 0.0000
                    },
                    "minWidth": 140
                  }
                ]
              }
            ]
          }
        ]
      },
      {
        "id": 5,
        "name": "Quần Vợt",
        "key": "Tennis",
        "resourceKey": "Tennis",
        "betTypeGroupSets": [
          {
            "isLive": false,
            "betTypeGroups": [
              {
                "betTypes": [
                  {
                    "id": 1,
                    "name": "Handicap",
                    "title": "Handicap",
                    "resourceKey": "lblHandicapFC",
                    "pt": {
                      "a2": 0.0000,
                      "a1": 0.0000,
                      "n2": 0.0000
                    }
                  },
                  {
                    "id": 3,
                    "name": "Over/Under ",
                    "title": "Over/Under ",
                    "resourceKey": "lblOverUnder",
                    "pt": {
                      "a2": 0.0000,
                      "a1": 0.0000,
                      "n2": 0.0000
                    }
                  },
                  {
                    "id": 2,
                    "name": "Lẻ/Chẵn",
                    "title": "Lẻ/Chẵn",
                    "resourceKey": "lblOddEven",
                    "pt": {
                      "a2": 0.0000,
                      "a1": 0.0000,
                      "n2": 0.0000
                    }
                  },
                  {
                    "id": 20,
                    "name": "Money Line",
                    "title": "Money Line",
                    "resourceKey": "moneyline",
                    "pt": {
                      "a2": 0.0000,
                      "a1": 0.0000,
                      "n2": 0.0000
                    },
                    "minWidth": 140
                  },
                  {
                    "id": 9999,
                    "name": "Thể loại khác",
                    "title": "Thể loại khác",
                    "resourceKey": "OtherSport2",
                    "pt": {
                      "a2": 0.0000,
                      "a1": 0.0000,
                      "n2": 0.0000
                    },
                    "minWidth": 90,
                    "showDetailIcon": false,
                    "showBottomBorder": true
                  }
                ]
              }
            ]
          }
        ]
      },
      {
        "id": 8,
        "name": "Bóng Chày",
        "key": "Baseball",
        "resourceKey": "Baseball",
        "betTypeGroupSets": [
          {
            "isLive": false,
            "betTypeGroups": [
              {
                "betTypes": [
                  {
                    "id": 1,
                    "name": "Handicap",
                    "title": "Handicap",
                    "resourceKey": "lblHandicapFC",
                    "pt": {
                      "a2": 0.0000,
                      "a1": 0.0000,
                      "n2": 0.0000
                    }
                  },
                  {
                    "id": 3,
                    "name": "Over/Under ",
                    "title": "Over/Under ",
                    "resourceKey": "lblOverUnder",
                    "pt": {
                      "a2": 0.0000,
                      "a1": 0.0000,
                      "n2": 0.0000
                    }
                  },
                  {
                    "id": 20,
                    "name": "Money Line",
                    "title": "Money Line",
                    "resourceKey": "moneyline",
                    "pt": {
                      "a2": 0.0000,
                      "a1": 0.0000,
                      "n2": 0.0000
                    },
                    "minWidth": 140
                  }
                ]
              }
            ]
          }
        ]
      },
      {
        "id": 10,
        "name": "Đánh Golf",
        "key": "Golf",
        "resourceKey": "Golf",
        "betTypeGroupSets": [
          {
            "isLive": false,
            "betTypeGroups": [
              {
                "betTypes": [
                  {
                    "id": 1,
                    "name": "Handicap",
                    "title": "Handicap",
                    "resourceKey": "lblHandicapFC",
                    "pt": {
                      "a2": 0.0000,
                      "a1": 0.0000,
                      "n2": 0.0000
                    }
                  },
                  {
                    "id": 3,
                    "name": "Over/Under ",
                    "title": "Over/Under ",
                    "resourceKey": "lblOverUnder",
                    "pt": {
                      "a2": 0.0000,
                      "a1": 0.0000,
                      "n2": 0.0000
                    }
                  },
                  {
                    "id": 2,
                    "name": "Lẻ/Chẵn",
                    "title": "Lẻ/Chẵn",
                    "resourceKey": "lblOddEven",
                    "pt": {
                      "a2": 0.0000,
                      "a1": 0.0000,
                      "n2": 0.0000
                    }
                  },
                  {
                    "id": 20,
                    "name": "Money Line",
                    "title": "Money Line",
                    "resourceKey": "moneyline",
                    "pt": {
                      "a2": 0.0000,
                      "a1": 0.0000,
                      "n2": 0.0000
                    },
                    "minWidth": 140
                  }
                ]
              }
            ]
          }
        ]
      },
      {
        "id": 11,
        "name": "Thể Thao Môtô",
        "key": "Moto Sports",
        "resourceKey": "MotorSports",
        "betTypeGroupSets": [
          {
            "isLive": false,
            "betTypeGroups": [
              {
                "betTypes": [
                  {
                    "id": 1,
                    "name": "Handicap",
                    "title": "Handicap",
                    "resourceKey": "lblHandicapFC",
                    "pt": {
                      "a2": 0.0000,
                      "a1": 0.0000,
                      "n2": 0.0000
                    }
                  },
                  {
                    "id": 20,
                    "name": "Money Line",
                    "title": "Money Line",
                    "resourceKey": "moneyline",
                    "pt": {
                      "a2": 0.0000,
                      "a1": 0.0000,
                      "n2": 0.0000
                    },
                    "minWidth": 140
                  }
                ]
              }
            ]
          }
        ]
      },
      {
        "id": 99,
        "name": "Môn Thể Thao khác",
        "key": "Other Sports",
        "resourceKey": "OtherSports",
        "betTypeGroupSets": [
          {
            "isLive": false,
            "betTypeGroups": [
              {
                "betTypes": [
                  {
                    "id": 1,
                    "name": "Handicap",
                    "title": "Handicap",
                    "resourceKey": "lblHandicapFC",
                    "pt": {
                      "a2": 0.0000,
                      "a1": 0.0000,
                      "n2": 0.0000
                    }
                  },
                  {
                    "id": 3,
                    "name": "Over/Under ",
                    "title": "Over/Under ",
                    "resourceKey": "lblOverUnder",
                    "pt": {
                      "a2": 0.0000,
                      "a1": 0.0000,
                      "n2": 0.0000
                    }
                  },
                  {
                    "id": 2,
                    "name": "Lẻ/Chẵn",
                    "title": "Lẻ/Chẵn",
                    "resourceKey": "lblOddEven",
                    "pt": {
                      "a2": 0.0000,
                      "a1": 0.0000,
                      "n2": 0.0000
                    }
                  },
                  {
                    "id": 20,
                    "name": "Money Line",
                    "title": "Money Line",
                    "resourceKey": "moneyline",
                    "pt": {
                      "a2": 0.0000,
                      "a1": 0.0000,
                      "n2": 0.0000
                    },
                    "minWidth": 140
                  }
                ]
              }
            ]
          }
        ]
      },
      {
        "id": 99,
        "name": "Mix Sports Parlay",
        "key": "Mix Sports Parlay",
        "resourceKey": "mixsports",
        "betTypeGroupSets": [
          {
            "isLive": false,
            "betTypeGroups": [
              {
                "betTypes": [
                  {
                    "id": 9,
                    "name": "Mix Parlay",
                    "title": "Cá cược tổng hợp",
                    "resourceKey": "lblMixParlay",
                    "pt": {
                      "a2": 0.0000,
                      "a1": 0.0000,
                      "n2": 0.0000
                    }
                  }
                ]
              }
            ]
          }
        ]
      },
      {
        "id": 154,
        "name": "HR Fixed Odds",
        "key": "HR Fixed Odds",
        "resourceKey": "HRFixedOdds",
        "betTypeGroupSets": [
          {
            "isLive": false,
            "betTypeGroups": [
              {
                "betTypes": [
                  {
                    "id": 20,
                    "name": "Money Line",
                    "title": "Money Line",
                    "resourceKey": "moneyline",
                    "pt": {
                      "a2": 0.0000,
                      "a1": 0.0000,
                      "n2": 0.0000
                    },
                    "minWidth": 140
                  }
                ]
              }
            ]
          }
        ]
      },
      {
        "id": 161,
        "name": "Number Game",
        "key": "Number Game",
        "resourceKey": "numbergame",
        "betTypeGroupSets": [
          {
            "isLive": false,
            "showGroupSetLabel": true,
            "betTypeGroups": [
              {
                "betTypes": [
                  {
                    "id": 81,
                    "name": "1st/Last O/U",
                    "title": "1st/Last O/U",
                    "resourceKey": "firstlastoverunder",
                    "pt": {
                      "a2": 0.0000,
                      "a1": 0.0000,
                      "n2": 0.0000
                    }
                  },
                  {
                    "id": 83,
                    "name": "1st/Last O/E",
                    "title": "1st/Last O/E",
                    "resourceKey": "firstlastoddeven",
                    "pt": {
                      "a2": 0.0000,
                      "a1": 0.0000,
                      "n2": 0.0000
                    },
                    "minWidth": 160
                  },
                  {
                    "id": 88,
                    "name": "Warrior",
                    "title": "Warrior",
                    "resourceKey": "warrior",
                    "pt": {
                      "a2": 0.0000,
                      "a1": 0.0000,
                      "n2": 0.0000
                    },
                    "minWidth": 139
                  },
                  {
                    "id": 86,
                    "name": "Lẻ/Chẵn",
                    "title": "Lẻ/Chẵn",
                    "resourceKey": "lblOddEven",
                    "pt": {
                      "a2": 0.0000,
                      "a1": 0.0000,
                      "n2": 0.0000
                    },
                    "minWidth": 130
                  }
                ]
              }
            ]
          },
          {
            "isLive": true,
            "showGroupSetLabel": true,
            "betTypeGroups": [
              {
                "betTypes": [
                  {
                    "id": 85,
                    "name": "Over/Under ",
                    "title": "Over/Under ",
                    "resourceKey": "lblOverUnder",
                    "pt": {
                      "a2": 0.0000,
                      "a1": 0.0000,
                      "n2": 0.0000
                    }
                  },
                  {
                    "id": 86,
                    "name": "Lẻ/Chẵn",
                    "title": "Lẻ/Chẵn",
                    "resourceKey": "lblOddEven",
                    "pt": {
                      "a2": 0.0000,
                      "a1": 0.0000,
                      "n2": 0.0000
                    },
                    "minWidth": 129
                  },
                  {
                    "id": 87,
                    "name": "High/Low",
                    "title": "High/Low",
                    "resourceKey": "highlow",
                    "pt": {
                      "a2": 0.0000,
                      "a1": 0.0000,
                      "n2": 0.0000
                    },
                    "minWidth": 80
                  },
                  {
                    "id": 89,
                    "name": "Next Combo",
                    "title": "Next Combo",
                    "resourceKey": "nextcombo",
                    "pt": {
                      "a2": 0.0000,
                      "a1": 0.0000,
                      "n2": 0.0000
                    },
                    "minWidth": 115
                  },
                  {
                    "id": 90,
                    "name": "Number Wheel",
                    "title": "Number Wheel",
                    "resourceKey": "numberGroup",
                    "pt": {
                      "a2": 0.0000,
                      "a1": 0.0000,
                      "n2": 0.0000
                    },
                    "minWidth": 100
                  }
                ]
              }
            ]
          }
        ]
      }
    ]
  }
};
<?php } else { ?>
var customer = {

  "custId": <?php echo $user->Id ?>,
  "userName": "<?php echo $user->username ?>",
  "newUserName": "",
  "password": "",
  "firstName": "<?php echo json_decode($user->settingOptions)->firstName ?>",
  "lastName": "<?php echo json_decode($user->settingOptions)->lastName ?>",
  "creator": <?php echo $user->parentUser ?>,
  "phone": "<?php echo json_decode($user->settingOptions)->phone ?>",
  "mobilePhone": "<?php echo json_decode($user->settingOptions)->mobilePhone ?>",
  "fax": "<?php echo json_decode($user->settingOptions)->fax ?>",
  "transferOption": "01111111",
  "credit": <?php echo $user->credit ?>,
  "minCredit": 0.0,
  "maxCredit": <?php echo $admin->Credit ?>,
  "memberMaxCredit": 0.0,
  "memberMinCredit": 0.0,
  "siteName": "789y",
  "currencyId": 0,
  "group": "a",
  "isInternal": false,
  "sRecommend": 13696269,
  "mRecommend": 0,
  "aRecommend": 0,
  "language": "VI",
  "bettingLimit": {
    "bettingLimitItems": [
      {
        "id": 1,
        "betTypeId": 0,
        "name": "Bóng Đá",
        "key": "Soccer",
        "resourceKey": "Soccer",
        "minBet": 3.0000,
        "maxBet": 2000.0000,
        "maxPerMatch": 4000.0000,
        "minBetMax": 3.0000,
        "maxBetMin": 2000.0000,
        "maxPerMatchMin": 0.0000,
        "maxPerMatchMax": 4000.0000
      },
      {
        "id": 2,
        "betTypeId": 0,
        "name": "Bóng Rổ",
        "key": "Basketball",
        "resourceKey": "Basketball",
        "minBet": 3.0000,
        "maxBet": 1000.0000,
        "maxPerMatch": 2000.0000,
        "minBetMax": 3.0000,
        "maxBetMin": 1000.0000,
        "maxPerMatchMin": 0.0000,
        "maxPerMatchMax": 2000.0000
      },
      {
        "id": 3,
        "betTypeId": 0,
        "name": "Bóng Bầu Dục Mỹ",
        "key": "Football",
        "resourceKey": "Football",
        "minBet": 3.0000,
        "maxBet": 1000.0000,
        "maxPerMatch": 2000.0000,
        "minBetMax": 3.0000,
        "maxBetMin": 1000.0000,
        "maxPerMatchMin": 0.0000,
        "maxPerMatchMax": 2000.0000
      },
      {
        "id": 5,
        "betTypeId": 0,
        "name": "Quần Vợt",
        "key": "Tennis",
        "resourceKey": "Tennis",
        "minBet": 3.0000,
        "maxBet": 1000.0000,
        "maxPerMatch": 2000.0000,
        "minBetMax": 3.0000,
        "maxBetMin": 1000.0000,
        "maxPerMatchMin": 0.0000,
        "maxPerMatchMax": 2000.0000
      },
      {
        "id": 8,
        "betTypeId": 0,
        "name": "Bóng Chày",
        "key": "Baseball",
        "resourceKey": "Baseball",
        "minBet": 3.0000,
        "maxBet": 1000.0000,
        "maxPerMatch": 2000.0000,
        "minBetMax": 3.0000,
        "maxBetMin": 1000.0000,
        "maxPerMatchMin": 0.0000,
        "maxPerMatchMax": 2000.0000
      },
      {
        "id": 10,
        "betTypeId": 0,
        "name": "Đánh Golf",
        "key": "Golf",
        "resourceKey": "Golf",
        "minBet": 3.0000,
        "maxBet": 1000.0000,
        "maxPerMatch": 2000.0000,
        "minBetMax": 3.0000,
        "maxBetMin": 1000.0000,
        "maxPerMatchMin": 0.0000,
        "maxPerMatchMax": 2000.0000
      },
      {
        "id": 11,
        "betTypeId": 0,
        "name": "Thể Thao Môtô",
        "key": "Moto Sports",
        "resourceKey": "MotorSports",
        "minBet": 3.0000,
        "maxBet": 1000.0000,
        "maxPerMatch": 2000.0000,
        "minBetMax": 3.0000,
        "maxBetMin": 1000.0000,
        "maxPerMatchMin": 0.0000,
        "maxPerMatchMax": 2000.0000
      },
      {
        "id": 99,
        "betTypeId": 0,
        "name": "Môn Thể Thao khác",
        "key": "Other Sports",
        "resourceKey": "OtherSports",
        "minBet": 3.0000,
        "maxBet": 1000.0000,
        "maxPerMatch": 2000.0000,
        "minBetMax": 3.0000,
        "maxBetMin": 1000.0000,
        "maxPerMatchMin": 0.0000,
        "maxPerMatchMax": 2000.0000
      },
      {
        "id": 99,
        "betTypeId": 0,
        "name": "Mix Sports Parlay",
        "key": "Mix Sports Parlay",
        "resourceKey": "mixsports",
        "minBet": 3.0000,
        "maxBet": 1000.0000,
        "maxPerMatch": 2000.0000,
        "minBetMax": 3.0000,
        "maxBetMin": 1000.0000,
        "maxPerMatchMin": 0.0000,
        "maxPerMatchMax": 2000.0000
      },
      {
        "id": 154,
        "betTypeId": 0,
        "name": "HR Fixed Odds",
        "key": "HR Fixed Odds",
        "resourceKey": "HRFixedOdds",
        "minBet": 3.0000,
        "maxBet": 1000.0000,
        "maxPerMatch": 2000.0000,
        "minBetMax": 3.0000,
        "maxBetMin": 1000.0000,
        "maxPerMatchMin": 0.0000,
        "maxPerMatchMax": 2000.0000
      },
      {
        "id": 161,
        "betTypeId": 0,
        "name": "Number Game",
        "key": "Number Game",
        "resourceKey": "numbergame",
        "minBet": 3.0000,
        "maxBet": 100.0000,
        "maxPerMatch": 1000.0000,
        "maxPerBall": 1000.0000,
        "minBetMax": 3.0000,
        "maxBetMin": 1000.0000,
        "maxPerMatchMin": 0.0000,
        "maxPerMatchMax": 1000.0000,
        "maxPerBallMax": 1000.0000
      }
    ]
  },
  "statusSetting": {
    "disable151_31": false,
    "disable151_41": false,
    "disable151_51": false,
    "disable152_41": false,
    "disable152_51": false,
    "disable153_51": false,
    "disableFinancial": false,
    "disableCasino": false,
    "syncCasino": true,
    "disableBingo": false,
    "syncBingo": true,
    "disableNumber": false,
    "disableP2P": false,
    "disableFUNP2P": false,
    "disable162_1101": false,
    "isInternal": false,
    "disableAutoMPT": false,
    "suspended": <?php echo ($user->status==3)?"true":"false" ?>,
    "closed": <?php echo ($user->status==2)?"true":"false" ?>,
    "uplineClosed": false,
    "uplineSuspended": false,
    "disableVirtualSports": false,
    "hideVirtualSports": false,
    "disableDownlinesVirtualSports": false,
    "disableUplineVirtualSports": false
  },
  "commissionSetting": {
    "roleId": 1,
    "groupA": 0.00000000,
    "groupB": 0.00000000,
    "groupC": 0.00000000,
    "groupD": 0.00000000,
    "discountCS": 0.01000000,
    "discount1x2": 0.00250000,
    "discountNumber": 0.00000000,
    "discountHRFixedOdds": 0.01000000,
    "groupAMax": 0.00000000,
    "groupBMax": 0.00000000,
    "groupCMax": 0.00000000,
    "groupDMax": 0.00000000,
    "discountCSMax": 0.01000000,
    "discount1x2Max": 0.00250000,
    "discountNumberMax": 0.00000000,
    "discountHRFixedOddsMax": 0.01000000,
    "discount": 0.00250000,
    "playerDiscount": 0.00200000,
    "playerDiscount1x2": 0.00200000,
    "playerDiscountCs": 0.01000000,
    "playerDiscountNumber": 0.00000000,
    "playerDiscountHRFixedOdds": 0.01000000
  },
  "commissionSetting2": {
    "roleId": 0,
    "groupA": 0.0,
    "groupB": 0.0,
    "groupC": 0.0,
    "groupD": 0.0,
    "discountCS": 0.0,
    "discount1x2": 0.0,
    "discountNumber": 0.0,
    "discountHRFixedOdds": 0.0,
    "groupAMax": 0.0,
    "groupBMax": 0.0,
    "groupCMax": 0.0,
    "groupDMax": 0.0,
    "discountCSMax": 0.0,
    "discount1x2Max": 0.0,
    "discountNumberMax": 0.0,
    "discountHRFixedOddsMax": 0.0,
    "discount": 0.0,
    "playerDiscount": 0.0,
    "playerDiscount1x2": 0.0,
    "playerDiscountCs": 0.0,
    "playerDiscountNumber": 0.0,
    "playerDiscountHRFixedOdds": 0.0
  },
  "ptSetting": {
    "name": "ptGrid1",
    "sportTypes": [
      {
        "id": 1,
        "name": "Bóng Đá",
        "key": "Soccer",
        "resourceKey": "Soccer",
        "collapsed": false,
        "betTypeGroupSets": [
          {
            "isLive": false,
            "showGroupSetLabel": true,
            "betTypeGroups": [
              {
                "id": 1,
                "betTypes": [
                  {
                    "id": 1,
                    "name": "Handicap",
                    "title": "Handicap",
                    "resourceKey": "lblHandicapFC",
                    "pt": {
                      "a2": 0.0000,
                      "a1": 0.0000,
                      "n2": 0.0000
                    }
                  },
                  {
                    "id": 3,
                    "name": "Over/Under ",
                    "title": "Over/Under ",
                    "resourceKey": "lblOverUnder",
                    "pt": {
                      "a2": 0.0000,
                      "a1": 0.0000,
                      "n2": 0.0000
                    },
                    "minWidth": 90
                  },
                  {
                    "id": 7,
                    "name": "Hiệp 1 - Hdp",
                    "title": "Hiệp 1 - Hdp",
                    "resourceKey": "lbl1stHdp",
                    "pt": {
                      "a2": 0.0000,
                      "a1": 0.0000,
                      "n2": 0.0000
                    },
                    "minWidth": 97
                  },
                  {
                    "id": 8,
                    "name": "Hiệp 1 - OU",
                    "title": "Hiệp 1 - OU",
                    "resourceKey": "lbl1stOU",
                    "pt": {
                      "a2": 0.0000,
                      "a1": 0.0000,
                      "n2": 0.0000
                    },
                    "minWidth": 90
                  },
                  {
                    "id": 2,
                    "name": "Lẻ/Chẵn",
                    "title": "Lẻ/Chẵn",
                    "resourceKey": "lblOddEven",
                    "pt": {
                      "a2": 0.0000,
                      "a1": 0.0000,
                      "n2": 0.0000
                    },
                    "minWidth": 90
                  },
                  {
                    "id": 9999,
                    "name": "Thể loại khác",
                    "title": "Thể loại khác",
                    "resourceKey": "OtherSport2",
                    "pt": {
                      "a2": 0.0000,
                      "a1": 0.0000,
                      "n2": 0.0000
                    },
                    "minWidth": 90,
                    "showDetailIcon": false,
                    "showBottomBorder": true
                  }
                ]
              },
              {
                "id": 2,
                "betTypes": [
                  {
                    "id": 5,
                    "name": "1 X 2",
                    "title": "1 X 2",
                    "resourceKey": "lbl1x2",
                    "pt": {
                      "a2": 0.0000,
                      "a1": 0.0000,
                      "n2": 0.0000
                    }
                  },
                  {
                    "id": 4,
                    "name": "Correct Score",
                    "title": "Điểm số chính xác",
                    "resourceKey": "correctscore",
                    "pt": {
                      "a2": 0.0000,
                      "a1": 0.0000,
                      "n2": 0.0000
                    },
                    "minWidth": 90
                  },
                  {
                    "id": 6,
                    "name": "Total Goal",
                    "title": "Tổng số bàn thắng",
                    "resourceKey": "totalgoal",
                    "pt": {
                      "a2": 0.0000,
                      "a1": 0.0000,
                      "n2": 0.0000
                    },
                    "minWidth": 97
                  },
                  {
                    "id": 9,
                    "name": "Mix Parlay",
                    "title": "Cá cược tổng hợp",
                    "resourceKey": "lblMixParlay",
                    "pt": {
                      "a2": 0.0000,
                      "a1": 0.0000,
                      "n2": 0.0000
                    },
                    "minWidth": 90
                  },
                  {
                    "id": 10,
                    "name": "Cược Thắng",
                    "title": "Cược Thắng",
                    "resourceKey": "lblOutRight",
                    "pt": {
                      "a2": 0.0000,
                      "a1": 0.0000,
                      "n2": 0.0000
                    },
                    "minWidth": 90,
                    "showRightBorder": true
                  }
                ]
              }
            ]
          },
          {
            "isLive": true,
            "showGroupSetLabel": true,
            "betTypeGroups": [
              {
                "betTypes": [
                  {
                    "id": 1,
                    "name": "Handicap",
                    "title": "Handicap",
                    "resourceKey": "lblHandicapFC",
                    "pt": {
                      "a2": 0.0000,
                      "a1": 0.0000,
                      "n2": 0.0000
                    }
                  },
                  {
                    "id": 3,
                    "name": "Over/Under ",
                    "title": "Over/Under ",
                    "resourceKey": "lblOverUnder",
                    "pt": {
                      "a2": 0.0000,
                      "a1": 0.0000,
                      "n2": 0.0000
                    },
                    "minWidth": 124
                  },
                  {
                    "id": 7,
                    "name": "Hiệp 1 - Hdp",
                    "title": "Hiệp 1 - Hdp",
                    "resourceKey": "lbl1stHdp",
                    "pt": {
                      "a2": 0.0000,
                      "a1": 0.0000,
                      "n2": 0.0000
                    },
                    "minWidth": 124
                  },
                  {
                    "id": 8,
                    "name": "Hiệp 1 - OU",
                    "title": "Hiệp 1 - OU",
                    "resourceKey": "lbl1stOU",
                    "pt": {
                      "a2": 0.0000,
                      "a1": 0.0000,
                      "n2": 0.0000
                    },
                    "minWidth": 124,
                    "showRightBorder": true
                  }
                ]
              }
            ]
          }
        ]
      },
      {
        "id": 2,
        "name": "Bóng Rổ",
        "key": "Basketball",
        "resourceKey": "Basketball",
        "betTypeGroupSets": [
          {
            "isLive": false,
            "betTypeGroups": [
              {
                "betTypes": [
                  {
                    "id": 1,
                    "name": "Handicap",
                    "title": "Handicap",
                    "resourceKey": "lblHandicapFC",
                    "pt": {
                      "a2": 0.0000,
                      "a1": 0.0000,
                      "n2": 0.0000
                    }
                  },
                  {
                    "id": 3,
                    "name": "Over/Under ",
                    "title": "Over/Under ",
                    "resourceKey": "lblOverUnder",
                    "pt": {
                      "a2": 0.0000,
                      "a1": 0.0000,
                      "n2": 0.0000
                    },
                    "minWidth": 90
                  },
                  {
                    "id": 2,
                    "name": "Lẻ/Chẵn",
                    "title": "Lẻ/Chẵn",
                    "resourceKey": "lblOddEven",
                    "pt": {
                      "a2": 0.0000,
                      "a1": 0.0000,
                      "n2": 0.0000
                    }
                  },
                  {
                    "id": 20,
                    "name": "Money Line",
                    "title": "Money Line",
                    "resourceKey": "moneyline",
                    "pt": {
                      "a2": 0.0000,
                      "a1": 0.0000,
                      "n2": 0.0000
                    },
                    "minWidth": 140
                  }
                ]
              }
            ]
          }
        ]
      },
      {
        "id": 3,
        "name": "Bóng Bầu Dục Mỹ",
        "key": "Football",
        "resourceKey": "Football",
        "betTypeGroupSets": [
          {
            "isLive": false,
            "betTypeGroups": [
              {
                "betTypes": [
                  {
                    "id": 1,
                    "name": "Handicap",
                    "title": "Handicap",
                    "resourceKey": "lblHandicapFC",
                    "pt": {
                      "a2": 0.0000,
                      "a1": 0.0000,
                      "n2": 0.0000
                    }
                  },
                  {
                    "id": 3,
                    "name": "Over/Under ",
                    "title": "Over/Under ",
                    "resourceKey": "lblOverUnder",
                    "pt": {
                      "a2": 0.0000,
                      "a1": 0.0000,
                      "n2": 0.0000
                    }
                  },
                  {
                    "id": 2,
                    "name": "Lẻ/Chẵn",
                    "title": "Lẻ/Chẵn",
                    "resourceKey": "lblOddEven",
                    "pt": {
                      "a2": 0.0000,
                      "a1": 0.0000,
                      "n2": 0.0000
                    }
                  },
                  {
                    "id": 20,
                    "name": "Money Line",
                    "title": "Money Line",
                    "resourceKey": "moneyline",
                    "pt": {
                      "a2": 0.0000,
                      "a1": 0.0000,
                      "n2": 0.0000
                    },
                    "minWidth": 140
                  }
                ]
              }
            ]
          }
        ]
      },
      {
        "id": 5,
        "name": "Quần Vợt",
        "key": "Tennis",
        "resourceKey": "Tennis",
        "betTypeGroupSets": [
          {
            "isLive": false,
            "betTypeGroups": [
              {
                "betTypes": [
                  {
                    "id": 1,
                    "name": "Handicap",
                    "title": "Handicap",
                    "resourceKey": "lblHandicapFC",
                    "pt": {
                      "a2": 0.0000,
                      "a1": 0.0000,
                      "n2": 0.0000
                    }
                  },
                  {
                    "id": 3,
                    "name": "Over/Under ",
                    "title": "Over/Under ",
                    "resourceKey": "lblOverUnder",
                    "pt": {
                      "a2": 0.0000,
                      "a1": 0.0000,
                      "n2": 0.0000
                    }
                  },
                  {
                    "id": 2,
                    "name": "Lẻ/Chẵn",
                    "title": "Lẻ/Chẵn",
                    "resourceKey": "lblOddEven",
                    "pt": {
                      "a2": 0.0000,
                      "a1": 0.0000,
                      "n2": 0.0000
                    }
                  },
                  {
                    "id": 20,
                    "name": "Money Line",
                    "title": "Money Line",
                    "resourceKey": "moneyline",
                    "pt": {
                      "a2": 0.0000,
                      "a1": 0.0000,
                      "n2": 0.0000
                    },
                    "minWidth": 140
                  },
                  {
                    "id": 9999,
                    "name": "Thể loại khác",
                    "title": "Thể loại khác",
                    "resourceKey": "OtherSport2",
                    "pt": {
                      "a2": 0.0000,
                      "a1": 0.0000,
                      "n2": 0.0000
                    },
                    "minWidth": 90,
                    "showDetailIcon": false,
                    "showBottomBorder": true
                  }
                ]
              }
            ]
          }
        ]
      },
      {
        "id": 8,
        "name": "Bóng Chày",
        "key": "Baseball",
        "resourceKey": "Baseball",
        "betTypeGroupSets": [
          {
            "isLive": false,
            "betTypeGroups": [
              {
                "betTypes": [
                  {
                    "id": 1,
                    "name": "Handicap",
                    "title": "Handicap",
                    "resourceKey": "lblHandicapFC",
                    "pt": {
                      "a2": 0.0000,
                      "a1": 0.0000,
                      "n2": 0.0000
                    }
                  },
                  {
                    "id": 3,
                    "name": "Over/Under ",
                    "title": "Over/Under ",
                    "resourceKey": "lblOverUnder",
                    "pt": {
                      "a2": 0.0000,
                      "a1": 0.0000,
                      "n2": 0.0000
                    }
                  },
                  {
                    "id": 20,
                    "name": "Money Line",
                    "title": "Money Line",
                    "resourceKey": "moneyline",
                    "pt": {
                      "a2": 0.0000,
                      "a1": 0.0000,
                      "n2": 0.0000
                    },
                    "minWidth": 140
                  }
                ]
              }
            ]
          }
        ]
      },
      {
        "id": 10,
        "name": "Đánh Golf",
        "key": "Golf",
        "resourceKey": "Golf",
        "betTypeGroupSets": [
          {
            "isLive": false,
            "betTypeGroups": [
              {
                "betTypes": [
                  {
                    "id": 1,
                    "name": "Handicap",
                    "title": "Handicap",
                    "resourceKey": "lblHandicapFC",
                    "pt": {
                      "a2": 0.0000,
                      "a1": 0.0000,
                      "n2": 0.0000
                    }
                  },
                  {
                    "id": 3,
                    "name": "Over/Under ",
                    "title": "Over/Under ",
                    "resourceKey": "lblOverUnder",
                    "pt": {
                      "a2": 0.0000,
                      "a1": 0.0000,
                      "n2": 0.0000
                    }
                  },
                  {
                    "id": 2,
                    "name": "Lẻ/Chẵn",
                    "title": "Lẻ/Chẵn",
                    "resourceKey": "lblOddEven",
                    "pt": {
                      "a2": 0.0000,
                      "a1": 0.0000,
                      "n2": 0.0000
                    }
                  },
                  {
                    "id": 20,
                    "name": "Money Line",
                    "title": "Money Line",
                    "resourceKey": "moneyline",
                    "pt": {
                      "a2": 0.0000,
                      "a1": 0.0000,
                      "n2": 0.0000
                    },
                    "minWidth": 140
                  }
                ]
              }
            ]
          }
        ]
      },
      {
        "id": 11,
        "name": "Thể Thao Môtô",
        "key": "Moto Sports",
        "resourceKey": "MotorSports",
        "betTypeGroupSets": [
          {
            "isLive": false,
            "betTypeGroups": [
              {
                "betTypes": [
                  {
                    "id": 1,
                    "name": "Handicap",
                    "title": "Handicap",
                    "resourceKey": "lblHandicapFC",
                    "pt": {
                      "a2": 0.0000,
                      "a1": 0.0000,
                      "n2": 0.0000
                    }
                  },
                  {
                    "id": 20,
                    "name": "Money Line",
                    "title": "Money Line",
                    "resourceKey": "moneyline",
                    "pt": {
                      "a2": 0.0000,
                      "a1": 0.0000,
                      "n2": 0.0000
                    },
                    "minWidth": 140
                  }
                ]
              }
            ]
          }
        ]
      },
      {
        "id": 99,
        "name": "Môn Thể Thao khác",
        "key": "Other Sports",
        "resourceKey": "OtherSports",
        "betTypeGroupSets": [
          {
            "isLive": false,
            "betTypeGroups": [
              {
                "betTypes": [
                  {
                    "id": 1,
                    "name": "Handicap",
                    "title": "Handicap",
                    "resourceKey": "lblHandicapFC",
                    "pt": {
                      "a2": 0.0000,
                      "a1": 0.0000,
                      "n2": 0.0000
                    }
                  },
                  {
                    "id": 3,
                    "name": "Over/Under ",
                    "title": "Over/Under ",
                    "resourceKey": "lblOverUnder",
                    "pt": {
                      "a2": 0.0000,
                      "a1": 0.0000,
                      "n2": 0.0000
                    }
                  },
                  {
                    "id": 2,
                    "name": "Lẻ/Chẵn",
                    "title": "Lẻ/Chẵn",
                    "resourceKey": "lblOddEven",
                    "pt": {
                      "a2": 0.0000,
                      "a1": 0.0000,
                      "n2": 0.0000
                    }
                  },
                  {
                    "id": 20,
                    "name": "Money Line",
                    "title": "Money Line",
                    "resourceKey": "moneyline",
                    "pt": {
                      "a2": 0.0000,
                      "a1": 0.0000,
                      "n2": 0.0000
                    },
                    "minWidth": 140
                  }
                ]
              }
            ]
          }
        ]
      },
      {
        "id": 99,
        "name": "Mix Sports Parlay",
        "key": "Mix Sports Parlay",
        "resourceKey": "mixsports",
        "betTypeGroupSets": [
          {
            "isLive": false,
            "betTypeGroups": [
              {
                "betTypes": [
                  {
                    "id": 9,
                    "name": "Mix Parlay",
                    "title": "Cá cược tổng hợp",
                    "resourceKey": "lblMixParlay",
                    "pt": {
                      "a2": 0.0000,
                      "a1": 0.0000,
                      "n2": 0.0000
                    }
                  }
                ]
              }
            ]
          }
        ]
      },
      {
        "id": 154,
        "name": "HR Fixed Odds",
        "key": "HR Fixed Odds",
        "resourceKey": "HRFixedOdds",
        "betTypeGroupSets": [
          {
            "isLive": false,
            "betTypeGroups": [
              {
                "betTypes": [
                  {
                    "id": 20,
                    "name": "Money Line",
                    "title": "Money Line",
                    "resourceKey": "moneyline",
                    "pt": {
                      "a2": 0.0000,
                      "a1": 0.0000,
                      "n2": 0.0000
                    },
                    "minWidth": 140
                  }
                ]
              }
            ]
          }
        ]
      },
      {
        "id": 161,
        "name": "Number Game",
        "key": "Number Game",
        "resourceKey": "numbergame",
        "betTypeGroupSets": [
          {
            "isLive": false,
            "showGroupSetLabel": true,
            "betTypeGroups": [
              {
                "betTypes": [
                  {
                    "id": 81,
                    "name": "1st/Last O/U",
                    "title": "1st/Last O/U",
                    "resourceKey": "firstlastoverunder",
                    "pt": {
                      "a2": 0.0000,
                      "a1": 0.0000,
                      "n2": 0.0000
                    }
                  },
                  {
                    "id": 83,
                    "name": "1st/Last O/E",
                    "title": "1st/Last O/E",
                    "resourceKey": "firstlastoddeven",
                    "pt": {
                      "a2": 0.0000,
                      "a1": 0.0000,
                      "n2": 0.0000
                    },
                    "minWidth": 160
                  },
                  {
                    "id": 88,
                    "name": "Warrior",
                    "title": "Warrior",
                    "resourceKey": "warrior",
                    "pt": {
                      "a2": 0.0000,
                      "a1": 0.0000,
                      "n2": 0.0000
                    },
                    "minWidth": 139
                  },
                  {
                    "id": 86,
                    "name": "Lẻ/Chẵn",
                    "title": "Lẻ/Chẵn",
                    "resourceKey": "lblOddEven",
                    "pt": {
                      "a2": 0.0000,
                      "a1": 0.0000,
                      "n2": 0.0000
                    },
                    "minWidth": 130
                  }
                ]
              }
            ]
          },
          {
            "isLive": true,
            "showGroupSetLabel": true,
            "betTypeGroups": [
              {
                "betTypes": [
                  {
                    "id": 85,
                    "name": "Over/Under ",
                    "title": "Over/Under ",
                    "resourceKey": "lblOverUnder",
                    "pt": {
                      "a2": 0.0000,
                      "a1": 0.0000,
                      "n2": 0.0000
                    }
                  },
                  {
                    "id": 86,
                    "name": "Lẻ/Chẵn",
                    "title": "Lẻ/Chẵn",
                    "resourceKey": "lblOddEven",
                    "pt": {
                      "a2": 0.0000,
                      "a1": 0.0000,
                      "n2": 0.0000
                    },
                    "minWidth": 129
                  },
                  {
                    "id": 87,
                    "name": "High/Low",
                    "title": "High/Low",
                    "resourceKey": "highlow",
                    "pt": {
                      "a2": 0.0000,
                      "a1": 0.0000,
                      "n2": 0.0000
                    },
                    "minWidth": 80
                  },
                  {
                    "id": 89,
                    "name": "Next Combo",
                    "title": "Next Combo",
                    "resourceKey": "nextcombo",
                    "pt": {
                      "a2": 0.0000,
                      "a1": 0.0000,
                      "n2": 0.0000
                    },
                    "minWidth": 115
                  },
                  {
                    "id": 90,
                    "name": "Number Wheel",
                    "title": "Number Wheel",
                    "resourceKey": "numberGroup",
                    "pt": {
                      "a2": 0.0000,
                      "a1": 0.0000,
                      "n2": 0.0000
                    },
                    "minWidth": 100
                  }
                ]
              }
            ]
          }
        ]
      }
    ]
  }
};
<?php }?>
var context = {
  "custId": <?php echo $admin->Id ?>,
  "agentId": 0,
  "userName": "<?php echo $admin->Username ?>",
  "targetCustId": <?php echo $user->Id ?>,
  "adminId": <?php echo $admin->Id ?>,
  "subAccId": 0,
  "roleId": 2,
  "currencyId": 64,
  "siteName": "789y",
  "targetRoleId": 1,
  "isNeutralSite": false,
  "formId": 1,
  "language": "vi-VN",
  "langKey": "VI"
}