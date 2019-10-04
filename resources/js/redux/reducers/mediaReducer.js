// global state for default null
const initialState = [
    {id: 1, name: 'Instagram', link: 'www.instagram.com'},
    {id: 2, name: 'Facebook', link: 'www.facebook.com'},
    {id: 3, name: 'github', link: 'www.github.com'}
] 

const mediaReducer = (state = initialState, action) => {    
    switch(action.type){
        case "STORE_MEDIA" :
           return state.concat([action.data]);

        case "UPDATE_MEDIA" :
            const newData = state.map((media) => {
                if(media.id !== action.data.id){
                     return media;
                }else{
                    return {
                        ...media,
                        name: action.data.name,
                        link: action.data.link
                    }
                }
            });

           return newData;

        case "REMOVE_MEDIA" :
                return state.filter(media => media.id !== action.id )

        default:
            return state
    }
}

export default mediaReducer;