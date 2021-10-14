<template>
<div class='slider_wrapper'>
    <div class='v-slider-item'  :style="{'margin-left':'-'+(100*currentSlideIndex)+'%'}">
        <v-slider-item
            v-for="item in slider_data"
            :key='item.id'
            :item_data="item"
           
            
        ></v-slider-item>

        </div>
    
</div>

</template>

<script>

import vSliderItem from "./vSliderItem";
export default {
    name:"v-slider",
    components:{vSliderItem}, 

    props:{ slider_data:{type: Array,
        default:()=>[]
        },
        interval:{
            type: Number, default:0
        }
     },
    data(){
        return{
         currentSlideIndex:0   

            
        }
    },

    methods:{
        prevSlide(){
                if (this.currentSlideIndex>0){
                    this.currentSlideIndex--
                    
                    }

        },

        nextSlide(){ if(this.currentSlideIndex >= this.slider_data.length-1){
                this.currentSlideIndex=0
            }
            else{this.currentSlideIndex++


            }
        },

        
    },
    mounted(){
            if (this.interval>0){
                    let vm = this;

                    setInterval( function(){
                        vm.nextSlide()
                        },vm.interval)


               
             }
            
        }
   
   
}
</script>