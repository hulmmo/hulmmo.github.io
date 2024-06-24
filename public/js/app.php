<?php
define('DOMAIN', 'https://'.$_SERVER['SERVER_NAME']);
?>
const __DATA__ = {
'config' : {'title' : 'Vũ Đức Hoàng | Thông Tin', 'favicon' : 'favicon.ico', 'notice': 'Chào Bạn! Dưới Đây Là Thông Tin Cá Nhân Của Mình. Thanks <3'},
'cover-image' : 'banner.gif', 'avatar-image' : 'avatar.png', 'name' : 'Vũ Đức Hoàng', 'is_tick' : true,
'skills': ['Designer', 'Editor'],
'bio-storys' : [{'image' : 'user.png', 'content' : 'Hul', 'author' : '@VuDucHoang.Profile',},],
'links': [
{ 'image': 'facebook.jpg', 'title': 'Facebook', 'show-value': '@VuDucHoang.Profile', 'value': 'https://www.facebook.com/1035920951', 'type': 0, },
{'image' : 'instagram.jpg', 'title' : 'Instagram',  'show-value' : '@vuduchoang_', 'value' : 'https://instagram.com/vuduchoang_', 'type' : 0,},
{ 'image': 'zalo.jpg', 'title': 'Zalo', 'show-value': '09456.10.789', 'value' : 'https://zalo.me/0945610789', 'type' : 0,},
{ 'image': 'phone.jpg', 'title': 'Hotline', 'show-value': '09456.10.789', 'value': 'tel:0945610789', 'type' : 0,},
{ 'image': 'gmail.jpg', 'title': 'Gmail', 'show-value': 'HulBooking@Gmail.Com', 'value': 'mailto:HulBooking@Gmail.Com', 'type': 0, },
{ 'image': 'mbbank.png', 'title': 'MB Quân Đội', 'show-value': '889895858', 'value': '889895858', 'type': 1, },
]
};
const json_data = __DATA__;
const username = json_data['name'];
const cover_img = json_data['cover-image'];
const avatar_img = json_data['avatar-image']
const skills = json_data['skills'];
const bio_storys = json_data['bio-storys']
const links = json_data['links']
const page_title = json_data['config']['title'];
const page_favicon = json_data['config']['favicon'];
const is_tick = json_data['is_tick'];
$(document).ready(function () {
console.log('READY !')
draw_console_header();
var container = document.getElementsByClassName('container')[0];
var bio_story_html = '';
var skills_html = '';
var links_html = '';
document.title = page_title;
document.getElementById('favicon').setAttribute('href', `<?=DOMAIN?>/public/images/${page_favicon}`);
show_modal(json_data['config']['notice']);
var split_name = username.split();
var first_name = '';
var last_name = '';
if (split_name.length <= 2) {
first_name = split_name.join(' ');
}else if (split_name == 3) {
first_name = split_name[0] + split_name[1];
last_name = split_name[2];
}else if (split_name == 4) {
first_name = split_name[0] + split_name[1];
last_name = split_name[2] + split_name[3];
}
if(is_tick) {
first_name += '<i class="fas fa-check-circle"></i>';
}
for (let i = 0; i < skills.length; i++) {
if (i % 2 == 0) {
skills_html += `<div class="skill-item" style="color: #EF9D64;" >${skills[i]}</div>&nbsp;`;
}else{
skills_html += `<div class="skill-item" style="color: #85D18A;" >${skills[i]}</div>`;
}
}
for (let i = 0; i < bio_storys.length; i++) {
bio_story_html += `<div class="bio-story"><div class="bio-story-thumb"style="background-image: url('<?=DOMAIN?>/public/images/${bio_storys[i]['image']}');"></div><div class="bio-story-content"><p>${bio_storys[i]['content']}</p><span>${bio_storys[i]['author']}</span></div></div>`;
}
container.innerHTML += `<header><div id="cover-image" style="background-image: url('<?=DOMAIN?>/public/images/${cover_img}');"></div><div id="profile-header"><div id="avatar-image" style="background-image: url('https://graph.facebook.com/1035920951/picture?width=900&height=900&access_token=6628568379|c1e620fa708a1d5696fb991c1bde5662');"></div><div id="name"><p id="first-name" class="names">${first_name}</p><p id="last-name" class="names">${last_name}</p><div id="skills">${skills_html}</div></div></div>${bio_story_html}</header>`;
for (let i = 0; i < links.length; i++) {
links_html += `<div class="link-item"><div class="bio-story-thumb" style="background-image: url('<?=DOMAIN?>/public/images/flatform/${links[i]['image']}');"></div><div class="link-content"><p>${links[i]['title']}</p><span onclick="${links[i]['type'] == 0 ? `window.open(${"'"}${links[i]['value']}${"'"}, '_blank')` : `copy(${"'"}${links[i]['value']}${"'"})`}">${links[i]['show-value']}</span></div><div class="link-btn"><div class="link-btn-chill ${links[i]['type'] == 0 ? 'light-orange' : 'light-blue'}" onclick="${links[i]['type'] == 0 ? `window.open(${"'"}${links[i]['value']}${"'"}, '_blank')` : `copy(${"'"}${links[i]['value']}${"'"})`}">${links[i]['type'] == 0 ? 'OPEN' : 'COPY'}</div></div></div>`;
}
container.innerHTML += `<div id="content-body"><p class="drop-title">Liên Kết Cá Nhân</p><div id="link-box">${links_html}</div></div>`;
});
function copy(str) {
const el = document.createElement('textarea');
el.value = str;
document.body.appendChild(el);
el.select();
document.execCommand('copy');
document.body.removeChild(el);
show_modal(`Sao Chép Thành Công!`);
console.log(`Copied ${str}`)
}
function show_modal(str){
document.getElementById('description').innerText = str;
document.getElementsByClassName("popup")[0].classList.add("active");
}
document.getElementById("dismiss-popup-btn").addEventListener("click", function () {
document.getElementsByClassName("popup")[0].classList.remove("active");
});
function draw_console_header() {
}