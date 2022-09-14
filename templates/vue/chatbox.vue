{literal}

<div class="row" id="Chat">
    <div class="contentChat">
        <h1>Mis amigos</h1>
        <h1 style="font-size: 20px;background-color: black;">Conectados {{onlineTotal }} <span style="font-family:arial;font-size: 20px;"> / </span>{{onlineTotal+offlineTotal}}</h1>
        <div v-for="friend in friendOnline" class="friend" type="button">
            <div class="imgFriend"><img src="images/profile.png" alt=""></div>
            <div class="friendData">
                <span class="name">
                        {{friend.name}} 
                    </span>
                <span class="title">
                        {{friend.title}}
                    </span>
            </div>

        </div>

        <h1 style="font-size: 20px;background-color: black;">DESCONECTADOS {{offlineTotal }} <span style="font-family:arial;font-size: 20px;"> / </span>{{onlineTotal+offlineTotal}}</h1>
        <div v-for="friend in friendOffline" class="friend" type="button">
            <div class="imgFriend"><img style="border:3px solid red" src="images/profile.png" alt=""></div>
            <div class="friendData">
                <span class="name">
                        {{friend.name}} 
                    </span>
                <span class="title">
                        {{friend.title}}
                    </span>
            </div>

        </div>
    </div>


</div>
<style>
    .contentChat {
        width: 80%;
        margin: auto;
        height: 500px;
        overflow-x: scroll;
        font-family: LineageII;
    }
    
    .friend {
        margin-bottom: 10px;
        height: 40px;
        display: flex;
        flex-direction: row;
        background-color: black;
    }
    
    .friend:hover {
        background: none;
    }
    
    .imgFriend {
        align-items: center;
        width: 30%;
    }
    
    .imgFriend>img {
        display: block;
        width: 50%;
        height: 100%;
        border-radius: 50%;
        margin: auto;
        border: 3px solid green;
    }
    
    .friendData {
        width: 70%;
        text-align: left;
    }
    
    .name {
        position: relative;
        top: 5px;
        font-size: 20px;
        font-weight: bold;
        letter-spacing: 1px;
    }
    
    .title {
        position: relative;
        top: 10px;
        font-size: 12px;
        letter-spacing: 1px;
    }
</style>
{/literal}