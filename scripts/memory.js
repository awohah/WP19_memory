function newGame() {
    let new_game = $.post("scripts/new_game.php", {call_now: "True"});
    new_game.done(function (data) {
        print_cards();
    });
}



function print_cards() {
    let cards_html = $.post("scripts/game_board.php", {call_now: "True"});
    let game_container = $('#game_board');
    cards_html.done(function(data) {
        game_container.empty();
        game_container.append(data.html);
        $('.tile').click(function () {
            makeVisible(this);
            console.log(this);


        });



    });


}
    var a = Array();
    var b = Array();
    let score_even = 0;
    let score_uneven = 0;
    let count_tiles= 0;
    let turns = 0;

    function match() {
        let comb1 = ["7", "11"];
        let comb2 = ["1", "5"];
        let comb3 = ["2", "9"];
        let comb4 = ["12", "6"];
        let comb5 = ["8", "3"];
        let comb6 = ["4", "10"];

        $('.tile').click(function (event) {
           console.log(score_uneven);
           console.log(score_even);
           turns = turns + 0.5;
           console.log(turns);
           console.log(turns % 2);

            let ima = this;
            b = b.concat(ima);
            console.log(b);
            let im = $(this).get(0)['id'];
            a = a.concat(im);
            if (a.length === 2) {
                if (count_tiles === 12) {
                    alert("stop the game");
                }

                else if (a[0] === comb1[0] && a[1] === comb1[1] || a[0] === comb1[1] && a[1] === comb1[0]) {
                    a.length = 0;
                    $('h1').text("good job").attr("class", "alert alert-success").css("width", "40%").css("margin", "auto");
                    console.log("good job");
                    if (turns % 2 === 0) {
                        score_even = score_even + 1;
                    }
                    else {
                        score_uneven = score_uneven + 1;
                    }
                    count_tiles = count_tiles + 2;
                    let card1 = document.getElementById("7");
                    let card2 = document.getElementById("11");
                    console.log(card1);
                    console.log(card2);

                    makeInvisible(b[0]);
                    makeInvisible(b[1]);
                    flip(b[0]);
                    flip(b[1]);
                    b.length = 0;

                } else if (a[0] === comb2[0] && a[1] === comb2[1] || a[0] === comb2[1] && a[1] === comb2[0]) {
                    $('h1').text("good job").attr("class", "alert alert-success").css("width", "40%").css("margin", "auto");
                    console.log("good job");
                    a.length = 0;
                    if (turns % 2 === 0) {
                        score_even = score_even + 1;
                    }
                    else {
                        score_uneven = score_uneven + 1;
                    }
                    count_tiles = count_tiles + 2;
                    makeInvisible(b[0]);
                    makeInvisible(b[1]);
                    flip(b[0]);
                    flip(b[1]);
                    b.length = 0;

                } else if (a[0] === comb3[0] && a[1] === comb3[1] || a[0] === comb3[1] && a[1] === comb3[0]) {
                    $('h1').text("good job").attr("class", "alert alert-success").css("width", "40%").css("margin", "auto");
                    console.log("good job");
                    a.length = 0;
                    if (turns % 2 === 0) {
                        score_even = score_even + 1;
                    }
                    else {
                        score_uneven = score_uneven + 1;
                    }
                    count_tiles = count_tiles + 2;
                    makeInvisible(b[0]);
                    makeInvisible(b[1]);
                    flip(b[0]);
                    flip(b[1]);
                    b.length = 0;

                } else if (a[0] === comb4[0] && a[1] === comb4[1] || a[0] === comb4[1] && a[1] === comb4[0]) {
                    $('h1').text("good job").attr("class", "alert alert-success").css("width", "40%").css("margin", "auto");
                    console.log("good job");
                    a.length = 0;
                    if (turns % 2 === 0) {
                        score_even = score_even + 1;
                    }
                    else {
                        score_uneven = score_uneven + 1;
                    }
                    count_tiles = count_tiles + 2;
                    makeInvisible(b[0]);
                    makeInvisible(b[1]);
                    flip(b[0]);
                    flip(b[1]);
                    b.length = 0;

                } else if (a[0] === comb5[0] && a[1] === comb5[1] || a[0] === comb5[1] && a[1] === comb5[0]) {
                    $('h1').text("good job").attr("class", "alert alert-success").css("width", "40%").css("margin", "auto");
                    console.log("good job");
                    a.length = 0;
                    if (turns % 2 === 0) {
                        score_even = score_even + 1;
                    }
                    else {
                        score_uneven = score_uneven + 1;
                    }
                    count_tiles = count_tiles + 2;
                    makeInvisible(b[0]);
                    makeInvisible(b[1]);
                    flip(b[0]);
                    flip(b[1]);
                    b.length = 0;


                } else if (a[0] === comb6[0] && a[1] === comb6[1] || a[0] === comb6[1] && a[1] === comb6[0]) {
                    $('h1').text("good job").attr("class", "alert alert-success").css("width", "40%").css("margin", "auto");
                    console.log("good job");
                    a.length = 0;
                    if (turns % 2 === 0) {
                        score_even = score_even + 1;
                    } else {
                        score_uneven = score_uneven + 1;
                    }
                    count_tiles = count_tiles + 2;
                    makeInvisible(b[0]);
                    makeInvisible(b[1]);
                    flip(b[0]);
                    flip(b[1]);
                    b.length = 0;
                }



                    else {
                    $('h1').text("wrong").attr("class", "alert alert-danger").css("width", "40%").css("margin", "auto");
                    console.log("wrong");
                    makeInvisible(b[0]);
                    makeInvisible(b[1]);
                    a.length = 0;
                    b.length = 0;
                }



            }
        });
    }



        function  flip(card) {
            let tile_id = $(card).attr('tile_id');
            let turn_tile = $.post("scripts/flip.php", {tile_id: tile_id});
            turn_tile.done(function (data) {
                print_cards();
            });
        }



        function makeVisible(card) {
            let tile_id = $(card).attr('tile_id');
            let turn_tile = $.post("scripts/visible.php", {tile_id: tile_id});
            turn_tile.done(function (data) {
                print_cards();
            });
        }

        function makeInvisible(card) {
            let tile_id = $(card).attr('tile_id');
            let turn_tile = $.post("scripts/invisible.php", {tile_id: tile_id});
            turn_tile.done(function (data) {
                print_cards();
            });
        }

        $(function() {
            newGame();


            window.setInterval(function () {
                print_cards();
            }, 2000);

        });
