let clicked_cards = [];
let tiles = [];
let matches = 0;
let round = 0;
let score_even = 0;
let score_uneven = 0;

function newGame() {
    let new_game = $.post("scripts/new_game.php", {call_now: "True"});
    new_game.done(function (data) {
        print_cards();
    });
}

function addScore() {
    let addScore = $.post("scripts/score1.php", {round: round});
    addScore.done(function (data) {
        console.log("plus 1");
    });
}

function addRound() {
    let addRound = $.post("scripts/score1.php", {round: round});
    addRound.done(function (data) {
        console.log("plus 1");
    });
}

function print_cards() {
    let cards_html = $.post("scripts/game_board.php", {call_now: "True"});
    let game_container = $('#game_board');
    cards_html.done(function(data) {
        game_container.empty();
        game_container.append(data.html);
        if (matches < 6) {
            $('.tile').click(function () {
                flipCard(this);
            });
        };
        if (matches === 6) {
            $('h1').text("End of game!").attr("class", "alert alert-primary");
        }
    });
}

function flipCard(card) {
    let tile_id = $(card).attr('tile_id');
    let picture = $(card).attr('picture');
    let turn_tile = $.post("scripts/flip.php", {tile_id: tile_id});
    turn_tile.done(function (data) {
        print_cards();
    });
    if (tile_id != tiles[tiles.length-1]){
        clicked_cards.push(picture);
        tiles.push(tile_id);
        if (clicked_cards.length%2 == 0) {
            addRound();
            if (clicked_cards[clicked_cards.length-2] == clicked_cards[clicked_cards.length-1]) {
                window.setTimeout(function () {
                    $('h1').text("good job").attr("class", "alert alert-success").css("width", "40%").css("margin", "auto");
                    makeInvisible(tiles[tiles.length-2]);
                    makeInvisible(tiles[tiles.length-1]);
                }, 500);
                matches++;
                addScore();
            } else {
                window.setTimeout(function () {
                    $('h1').text("wrong").attr("class", "alert alert-danger").css("width", "40%").css("margin", "auto");
                    flipCardBack(tiles[tiles.length-2]);
                    flipCardBack(tiles[tiles.length-1]);
                }, 500);
            };
        };
    };
}

function flipCardBack(tile_id) {
    let turn_tile = $.post("scripts/flip_back.php", {tile_id: tile_id});
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

function makeInvisible(tile_id) {
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