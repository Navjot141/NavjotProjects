//
//  GooglePlacesAPIParser.swift
//  mapproject
//
//  Created by Jinal on 2018-03-10.
//  Copyright © 2018 Jinal. All rights reserved.
//

import Foundation

class GooglePlacesAPIParser{
    class func parseNearbySearchResults(_ json: [String: Any]) -> [PlaceOfInterest]{
        var PlacesOfInterest: [PlaceOfInterest] = []
        if let results = json["results"] as? [[String: Any]]{
            for result in results {
                if let newPlace = PlaceOfInterest.init(json: result){
                    PlacesOfInterest.append(newPlace)
                }
            }
        }
         return PlacesOfInterest
    }
}
