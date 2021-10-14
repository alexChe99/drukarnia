<template>
    <div>
        <div class="slider-item__wrapper">
            <img class="img-slider" :src="imgurl" style="border-radius: 12px;">
            <div class="slider-item__foo">
                <div class="slider-item__title"><h3>{{this.item_data.title}}</h3></div>

                <div class="slider-item__add">
                <div class="icon-wrapper"> 
                    <i class="fas fa-map-marker-alt" style="margin-right:5px"></i><p>{{this.item_data.location}}</p>
                </div>
                <div class="icon-wrapper"> 
                    <i class="far fa-calendar-alt" style="margin-right:5px"></i><p>{{this.item_data.data}}</p>
                </div>
                <div class="icon-wrapper"> 
                    <i class="far fa-clock" style="margin-right:5px"></i><p><p>{{this.item_data.time}}</p></p>
                </div>
                
                
                
                </div><div class="slider-item__btn" style=""><a :href="item_data.link" style=" ">Зареєструватись</a></div>
            </div>
            
            
        </div>
    </div>

</template>

<script>
export default {
    name:"vSliderItem",
    props:{ item_data:{ type: Object, default:()=>[]}},
    data(){
        return{}
    },
     computed:{ imgurl: function () {
        return '/storage/'+this.item_data.attachment.path+this.item_data.attachment.name +'.'+ this.item_data.attachment.extension;
     },

     mounted(){
          let now = new Date();
                var curr_date = (now.getMonth() + 1) + '/' + now.getDate() + '/' +  now.getFullYear();
                console.log(curr_date);
                console.log(this.slider_data.data);
                
     }
    }
}
</script>