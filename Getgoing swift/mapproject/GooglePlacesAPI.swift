//
//  GooglePlacesAPI.swift
//  mapproject
//
//  Created by Jinal on 2018-03-10.
//  Copyright © 2018 Jinal. All rights reserved.
//

import Foundation
import UIKit
import  CoreLocation

class GooglePlacesAPI : NSObject{
    
    class func requestPlacs(query: String?, qradius: Float?, qopennow: Bool?, timeoutInterval: TimeInterval = 240.0, completion: @escaping (_ status: Int, _ errorMessage: String?, _ json:[String: Any]?) ->Void) {
        
        //let session = URLSession()
        
        
        var urlComponents = URLComponents()
        urlComponents.host = Constants.host
        urlComponents.scheme = Constants.scheme
        urlComponents.path = Constants.textPlaceSearch
        
        urlComponents.queryItems =
        [URLQueryItem(name: "query", value: query),
            URLQueryItem(name:"key" , value: Constants.apiKey),
            URLQueryItem(name:"opennow",value: String(describing: qopennow!)),
           // URLQueryItem(name:"radius", value:  String(Constants.radius)),
            URLQueryItem(name:"radius",value: String(describing: qradius!))
            
        ]
        print(urlComponents)
        
        if let url = urlComponents.url{
            let request = NSMutableURLRequest(url: url)
            
            let session = URLSession.shared
            let dataTask = session.dataTask(with: request as URLRequest,completionHandler: {(data, response, error) in
                if error != nil{
                    completion(500,"unknown error",nil)
                    return
        }
                else{
                    if let responseData = data, let json = try? JSONSerialization.jsonObject(with: responseData, options: []) as? [String: Any]{
                        completion(200,nil, json)
                }
                    else{
                        completion(500,"unknown error",nil)
                        return
                    }
                    }
                })
            dataTask.resume()
            
    
}
}
    class func requestPlacs(coordinate: CLLocationCoordinate2D, keyword: String?,qradius: Float?, qopennow: Bool?, completion: @escaping (_ status: Int, _ errorMessage: String?, _ json:[String: Any]?) -> Void) {
        
        //let session = URLSession()
        
        var urlComponents = URLComponents()
        urlComponents.host = Constants.host
        urlComponents.scheme = Constants.scheme
        urlComponents.path = Constants.coordinatePlaceSearch
        
        urlComponents.queryItems =
            [URLQueryItem(name: "location", value: "\(coordinate.latitude),\(coordinate.longitude)"),
             URLQueryItem(name:"radius", value: String(describing: qradius!)),
             URLQueryItem(name:"opennow",value: String(describing: qopennow!)),
             URLQueryItem(name: "key", value: Constants.apiKey)
        ]
        
           print(urlComponents)
        if let keyword = keyword {
            urlComponents.queryItems?.append(URLQueryItem(name: "keyword", value: keyword))
        }
        
        if let url = urlComponents.url{
            let request = NSMutableURLRequest(url: url)
            
            let session = URLSession.shared
            let dataTask = session.dataTask(with: request as URLRequest,completionHandler: {(data, response, error) in
                if error != nil{
                    completion(500,"unknown error",nil)
                    return
                }
                else{
                    if let responseData = data, let json = try? JSONSerialization.jsonObject(with: responseData, options: []) as? [String: Any]{
                        completion(200,nil, json)
                    }
                    else{
                        completion(500,"unknown error",nil)
                        return
                    }
                }
            })
            dataTask.resume()
            
            
        }
    }
    class func requestPhoto(photoreference: String, maxWidth: Int, completion: @escaping (_ status: Int, UIImage?) -> Void) {
        
        do {
            let session = URLSession.shared
            
            var urlComponents = URLComponents()
            urlComponents.scheme = Constants.scheme
            urlComponents.host = Constants.host
            urlComponents.path = Constants.placePhotoSearch
            
            urlComponents.queryItems = [
                URLQueryItem(name: "photoreference", value: photoreference),
                URLQueryItem(name: "maxwidth", value: String(maxWidth)),
                URLQueryItem(name: "key", value: Constants.apiKey)
            ]
            
            if let url = urlComponents.url{
                
                let request = NSMutableURLRequest(url: url)
                
                print("request \(String(describing: request.url))")
                let dataTask = session.dataTask(with: request as URLRequest, completionHandler: { (data, response, error) -> Void in
                    if let data = data {
                        let image = UIImage(data: data)
                        completion(200, image)
                        return
                    } else {
                        completion(500, nil)
                        return
                    }
                })
                dataTask.resume()
            }
        }
    }
    class func requestDetails(placeId: String, completion: @escaping (_ status: Int, _ message: String?, _ json: [String: Any]?) -> Void) {
        
        do {
            let session = URLSession.shared
            
            var urlComponents = URLComponents()
            urlComponents.scheme = Constants.scheme
            urlComponents.host = Constants.host
            urlComponents.path = Constants.placePhotoSearch
            
            urlComponents.queryItems = [
                URLQueryItem(name: "placeid", value: placeId),
                URLQueryItem(name: "key", value: Constants.apiKey)
            ]
            
            if let url = urlComponents.url{
                
                let request = NSMutableURLRequest(url: url)
                
                print("request \(String(describing: request.url))")
                let dataTask = session.dataTask(with: request as URLRequest, completionHandler: { (data, response, error) -> Void in
                    if let jsonData = data, let jsonResponse = try? JSONSerialization.jsonObject(with: jsonData, options: .allowFragments) as? [String: Any] {
                        print(jsonResponse ?? "no result")
                        completion(200, nil, jsonResponse)
                    } else {
                        completion(500, nil, nil)
                    }
                })
                dataTask.resume()
            }
        }
    }
    class func requestplacedetail(placeId: String, completion: @escaping (_ status: Int, _ message: String?, _ json: [String: Any]?) -> Void) {
        
        do {
            let session = URLSession.shared
            
            var urlComponents = URLComponents()
            urlComponents.scheme = Constants.scheme
            urlComponents.host = Constants.host
            urlComponents.path = Constants.placeDetails
            
            urlComponents.queryItems = [
                URLQueryItem(name: "placeid", value: placeId),
                URLQueryItem(name: "key", value: Constants.apiKey)
            ]
            
            if let url = urlComponents.url{
                
                let request = NSMutableURLRequest(url: url)
                
                print("request \(String(describing: request.url))")
                let dataTask = session.dataTask(with: request as URLRequest, completionHandler: { (data, response, error) -> Void in
                    if let jsonData = data, let jsonResponse = try? JSONSerialization.jsonObject(with: jsonData, options: .allowFragments) as? [String: Any] {
                        if let results = jsonResponse!["result"] as? [[String: Any]]{
                            print("results\(results)")
                        }
                        //print(jsonResponse ?? "no result")
                        completion(200, nil, jsonResponse)
                    } else {
                        completion(500, nil, nil)
                    }
                })
                dataTask.resume()
            }
        }
    }
}
